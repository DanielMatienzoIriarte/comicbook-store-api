<?php

namespace App\Filament\Resources;

use app\Enums\ComicBookFormat;
use App\Filament\Resources\ComicBookResource\Pages;
use App\Filament\Resources\ComicBookResource\RelationManagers;
use App\Models\ComicBook;
use App\Models\Type;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComicBookResource extends Resource
{
    protected static ?string $model = ComicBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('description')->required(),
                Forms\Components\TextInput::make('publisher')->required(),
                Forms\Components\FileUpload::make('cover')
                    ->required(),
                Forms\Components\Select::make('type_id')
                    ->label('Type')
                    ->relationship('types', 'id')
                    ->options(function(): array {
                        return Type::all()->pluck('name', 'id')->all();
                    })
                    ->required(),
                Forms\Components\Select::make('format')
                    ->options(ComicBookFormat::class)
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    ->relationship('categories', 'id')
                    ->options(function(): array {
                        return Category::all()->pluck('name', 'id')->all();
                    })
                    ->required()
                    ->multiple(),
                Forms\Components\Checkbox::make('status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('types.name')->label('Type'),
                Tables\Columns\TextColumn::make('format')->sortable(),
                Tables\Columns\ImageColumn::make('cover'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name');
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
            'index' => Pages\ListComicBooks::route('/'),
            'create' => Pages\CreateComicBook::route('/create'),
            'edit' => Pages\EditComicBook::route('/{record}/edit'),
        ];
    }
}
