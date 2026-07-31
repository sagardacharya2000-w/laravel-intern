<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Student')
                    ->options(User::where('role', 'student')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Select::make('plan_id')
                    ->label('Plan')
                    ->options(SubscriptionPlan::pluck('name', 'id'))
                    ->required(),

                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('active')
                    ->required(),

                DateTimePicker::make('starts_at')
                    ->label('Starts At'),

                DateTimePicker::make('expires_at')
                    ->label('Expires At'),
            ]);
    }
}
