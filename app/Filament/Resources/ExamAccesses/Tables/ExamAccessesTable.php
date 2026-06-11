<?php

namespace App\Filament\Resources\ExamAccesses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamAccessesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('questionSet.title')
                    ->label('Question Set')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('schoolClass.name')
                    ->label('Class')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('scheduled_at')
                    ->label('Scheduled At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->label('Expires At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->isUpcoming()
                        ? 'Upcoming'
                        : ($record->isActive() ? 'Live' : 'Expired'))
                    ->color(fn(string $state) => match ($state) {
                        'Upcoming' => 'info',
                        'Live'     => 'success',
                        'Expired'  => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
