<?php

namespace App\Filament\Resources\ExamAccesses;

use App\Filament\Resources\ExamAccesses\Pages\CreateExamAccess;
use App\Filament\Resources\ExamAccesses\Pages\EditExamAccess;
use App\Filament\Resources\ExamAccesses\Pages\ListExamAccesses;
use App\Filament\Resources\ExamAccesses\Schemas\ExamAccessForm;
use App\Filament\Resources\ExamAccesses\Tables\ExamAccessesTable;
use App\Models\ExamAccess;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExamAccessResource extends Resource
{
    protected static ?string $model = ExamAccess::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static string|\UnitEnum|null $navigationGroup = 'Exam Management';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ExamAccessForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamAccessesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExamAccesses::route('/'),
            'create' => CreateExamAccess::route('/create'),
            'edit' => EditExamAccess::route('/{record}/edit'),
        ];
    }
}
