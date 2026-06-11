<?php

namespace App\Filament\Resources\QuestionSets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuestionSetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subject_id')
                    ->required()
                    ->numeric(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('time_limit_minutes')
                    ->required()
                    ->numeric(),
                Toggle::make('is_randomized')
                    ->required(),
            ]);
    }
}
