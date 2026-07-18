<?php

namespace App\Filament\Resources;

use App\Models\SubscriptionPlan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class SubscriptionPlanResource extends Resource
{
    protected static ?string $model = SubscriptionPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Subscription Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duration_days')
                    ->numeric()
                    ->label('Duration (Days)')
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('duration_days')->label('Duration (Days)')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Price (Paisa)')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Active'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => SubscriptionPlanResource\Pages\InlineListSubscriptionPlans::route('/'),
            'create' => SubscriptionPlanResource\Pages\InlineCreateSubscriptionPlan::route('/create'),
            'edit' => SubscriptionPlanResource\Pages\InlineEditSubscriptionPlan::route('/{record}/edit'),
        ];
    }
}

namespace App\Filament\Resources\SubscriptionPlanResource\Pages;

class InlineListSubscriptionPlans extends ListRecords
{
    protected static string $resource = \App\Filament\Resources\SubscriptionPlanResource::class;
    protected function getHeaderActions(): array { return [Actions\CreateAction::make()]; }
}

class InlineCreateSubscriptionPlan extends CreateRecord
{
    protected static string $resource = \App\Filament\Resources\SubscriptionPlanResource::class;
}

class InlineEditSubscriptionPlan extends EditRecord
{
    protected static string $resource = \App\Filament\Resources\SubscriptionPlanResource::class;
    protected function getHeaderActions(): array { return [Actions\DeleteAction::make()]; }
}
