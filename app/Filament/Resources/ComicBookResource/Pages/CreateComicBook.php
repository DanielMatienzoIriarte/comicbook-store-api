<?php

namespace App\Filament\Resources\ComicBookResource\Pages;

use App\Filament\Resources\ComicBookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComicBook extends CreateRecord
{
    protected static string $resource = ComicBookResource::class;
}
