<?php

namespace App\Filament\Resources\Subjects\Pages;

use App\Filament\Resources\Subjects\SubjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubject extends CreateRecord
{
    protected static string $resource = SubjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['created_by'] = auth()->id();
    return $data;
}
 protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
