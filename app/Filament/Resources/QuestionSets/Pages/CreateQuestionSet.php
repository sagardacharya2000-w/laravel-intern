<?php

namespace App\Filament\Resources\QuestionSets\Pages;

use App\Filament\Resources\QuestionSets\QuestionSetResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateQuestionSet extends CreateRecord
{
    protected static string $resource = QuestionSetResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // #[Override]
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $data["created_by"] = auth()->id();
    //     return parent::mutateFormDataBeforeCreate($data);
    // }
}
