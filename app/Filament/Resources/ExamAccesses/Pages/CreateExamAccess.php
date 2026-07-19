<?php

namespace App\Filament\Resources\ExamAccesses\Pages;

use App\Filament\Resources\ExamAccesses\ExamAccessResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExamAccess extends CreateRecord
{
    protected static string $resource = ExamAccessResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['assigned_by'] = auth()->id();

        return $data;
    }
}
