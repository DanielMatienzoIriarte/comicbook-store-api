<?php

namespace App\Filament\Resources\ComicBookResource\Pages;

use App\Filament\Resources\ComicBookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComicBook extends EditRecord
{
    protected static string $resource = ComicBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
