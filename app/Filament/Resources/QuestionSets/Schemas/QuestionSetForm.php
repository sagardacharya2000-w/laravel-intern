<?php

namespace App\Filament\Resources\QuestionSets\Schemas;

use App\Models\Subject;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuestionSetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('subject_id')
                    ->label('Subject')
                    ->options(fn() => Subject::all()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('created_by')
                    ->label('Teacher')
                    ->options(fn() => User::all()->where('role', 'teacher')->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->required(),
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
