<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->maxSize(1024)
                    ->directory('assets/categories')
                    ->visibility('public')
                    ->columnSpan(['md' => 2]),
                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->debounce(500)
                    ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
