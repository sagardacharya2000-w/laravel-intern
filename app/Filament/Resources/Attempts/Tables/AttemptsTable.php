<?php

namespace App\Filament\Resources\Attempts\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AttemptsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->label('Student')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('questionSet.title')
                    ->label('Question Set')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'submitted' => 'success',
                        'timed_out' => 'warning',
                        'in_progress' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('score')
                    ->label('Score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_marks')
                    ->label('Total Marks')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('started_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'in_progress' => 'In Progress',
                        'submitted' => 'Submitted',
                        'timed_out' => 'Timed Out',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
