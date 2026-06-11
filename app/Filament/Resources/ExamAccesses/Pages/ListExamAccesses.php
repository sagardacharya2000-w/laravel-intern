<?php

namespace App\Filament\Resources\ExamAccesses\Pages;

use App\Filament\Resources\ExamAccesses\ExamAccessResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExamAccesses extends ListRecords
{
    protected static string $resource = ExamAccessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
