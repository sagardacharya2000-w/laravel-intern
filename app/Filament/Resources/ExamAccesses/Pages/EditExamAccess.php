<?php

namespace App\Filament\Resources\ExamAccesses\Pages;

use App\Filament\Resources\ExamAccesses\ExamAccessResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamAccess extends EditRecord
{
    protected static string $resource = ExamAccessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
