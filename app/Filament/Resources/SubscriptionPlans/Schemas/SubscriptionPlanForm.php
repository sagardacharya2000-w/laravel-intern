<?php

namespace App\Filament\Resources\SubscriptionPlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SubscriptionPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('duration_days')
                    ->required()
                    ->numeric(),
                TextInput::make('price')
                ->label('Price (NPR)')
                    ->required()
                    ->numeric()
                    ->prefix('Rs.')
                    ->helperText('Enter the price in rupees — stored internally as paisa.')
                    ->dehydrateStateUsing(fn ($state) => (int) round($state * 100))
                    ->formatStateUsing(fn ($state) => $state !== null ? $state / 100 : null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
