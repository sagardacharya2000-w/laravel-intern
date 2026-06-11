<?php

namespace App\Filament\Resources\QuestionSets\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'questions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('prompt')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('option_a')
                    ->required(),
                TextInput::make('option_b')
                    ->required(),
                TextInput::make('option_c')
                    ->required(),
                TextInput::make('option_d')
                    ->required(),
                Select::make('correct_answer')
                    ->options(['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'])
                    ->required(),
                TextInput::make('marks')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('prompt')
            ->columns([
                TextColumn::make('option_a')
                    ->searchable(),
                TextColumn::make('option_b')
                    ->searchable(),
                TextColumn::make('option_c')
                    ->searchable(),
                TextColumn::make('option_d')
                    ->searchable(),
                TextColumn::make('correct_answer')
                    ->badge(),
                TextColumn::make('marks')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
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
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
