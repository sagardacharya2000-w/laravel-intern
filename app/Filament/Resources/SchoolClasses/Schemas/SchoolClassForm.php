<?php

namespace App\Filament\Resources\SchoolClasses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SchoolClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teacher', 'name', fn ($query) => $query->where('role', 'teacher'))
                    ->searchable()
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('grade_level')
                    ->required(),
                TextInput::make('academic_year')
                    ->required(),
                TextInput::make('class_code')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }
}
