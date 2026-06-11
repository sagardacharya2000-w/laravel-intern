<?php

namespace App\Filament\Resources\QuestionSets\Tables;

use App\Models\Subject;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class QuestionSetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject.name')
                    ->label('Subject')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('teacher.name')
                    ->label('Teacher')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('time_limit_minutes')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_randomized')
                    ->boolean(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('subject_id')
                    ->label('Subject')
                    ->options(fn() => Subject::all()->pluck('name', 'id')->toArray())
                    ->searchable(),
                SelectFilter::make('teacher_id')
                    ->label('Teacher')
                    ->options(fn() => User::all()->where('role', 'teacher')->pluck('name', 'id')->toArray())
                    ->searchable(),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
