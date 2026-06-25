<?php

namespace App\Filament\Resources\ExamAccesses\Schemas;

use App\Models\QuestionSet;
use App\Models\SchoolClass;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ExamAccessForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('question_set_id')
                    ->label('Question Set')
                    ->options(fn() => QuestionSet::all()->pluck('title', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('class_id')
                    ->label('Class')
                    ->options(fn() => SchoolClass::all()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->required(),
                   Select::make('assigned_by')
                ->label('Assigned By')
                ->default(auth()->id())
               ->required()
                ->disabled(),
                DateTimePicker::make('scheduled_at')
                    ->label('Scheduled At')
                    ->required(),
                DateTimePicker::make('expires_at')
                    ->label('Expires At')
                    ->required(),
            ]);
    }
}
