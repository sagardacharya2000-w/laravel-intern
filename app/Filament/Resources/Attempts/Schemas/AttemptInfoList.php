<?php

namespace App\Filament\Resources\Attempts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttemptInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attempt Details')
                    ->columns(2)
                    ->components([
                        TextEntry::make('student.name')
                            ->label('Student'),
                        TextEntry::make('questionSet.title')
                            ->label('Question Set'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'submitted' => 'success',
                                'timed_out' => 'warning',
                                'in_progress' => 'gray',
                                default => 'gray',
                            }),
                        TextEntry::make('score')
                            ->label('Score'),
                        TextEntry::make('total_marks')
                            ->label('Total Marks'),
                        TextEntry::make('percentage')
                            ->label('Percentage')
                            ->state(fn ($record) => $record->percentage() . '%'),
                        TextEntry::make('started_at')
                            ->dateTime(),
                        TextEntry::make('submitted_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
