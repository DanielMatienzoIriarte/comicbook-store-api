<?php

namespace App\Filament\Resources\BookStoreResource\Pages;

use App\Filament\Resources\BookStoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookStore extends EditRecord
{
    protected static string $resource = BookStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
