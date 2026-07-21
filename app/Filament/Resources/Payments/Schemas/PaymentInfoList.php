<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Payment Details')
                    ->columns(2)
                    ->components([
                        TextEntry::make('subscription.plan.name')
                            ->label('Plan'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'success' => 'success',
                                'failed' => 'danger',
                                'pending' => 'warning',
                                default => 'gray',
                            }),
                        TextEntry::make('amount')
                            ->label('Amount')
                            ->state(fn ($record) => 'Rs. ' . number_format($record->amountInRupees(), 2)),
                        TextEntry::make('khalti_pidx')
                            ->label('Khalti PIDX')
                            ->copyable(),
                        TextEntry::make('khalti_txn_id')
                            ->label('Khalti Transaction ID')
                            ->copyable()
                            ->placeholder('—'),
                        TextEntry::make('failure_reason')
                            ->label('Failure Reason')
                            ->placeholder('—')
                            ->visible(fn ($record) => $record->status === 'failed'),
                        TextEntry::make('paid_at')
                            ->dateTime()
                            ->placeholder('—'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
