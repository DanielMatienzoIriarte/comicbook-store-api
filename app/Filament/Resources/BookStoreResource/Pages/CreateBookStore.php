<?php

namespace App\Filament\Resources\BookStoreResource\Pages;

use App\Filament\Resources\BookStoreResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBookStore extends CreateRecord
{
    protected static string $resource = BookStoreResource::class;
}
