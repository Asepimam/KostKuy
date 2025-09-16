<?php

namespace App\Filament\Resources\Cities\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class CityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                // Input image
                FileUpload::make('image')
                    ->label('City Image')
                    ->image()
                    ->directory('assets/cities')
                    ->visibility('public')
                    ->maxSize(1024)
                    ->required()
                    ->columnSpan(['md' => 2]),
                // Input name
               TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->debounce(500)
                    ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
                // Input slug
                TextInput::make('slug')
                    ->label('City Slug')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}