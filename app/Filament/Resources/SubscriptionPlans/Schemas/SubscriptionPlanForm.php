<?php

namespace App\Filament\Resources\SubscriptionPlans\Schemas;

use Filament\Forms;
use Filament\Forms\Form;

class SubscriptionPlanForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('period')
                    ->options([
                        'monthly' => 'Monthly',
                        'yearly' => 'Yearly',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->label('Price (Paisa)')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active Status')
                    ->default(true),
            ]);
    }
}
