<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->maxSize(1024)
                    ->required()
                    ->directory('assets/testimonials')
                    ->visibility('public')
                    ->columnSpan(2),
                Select::make('boarding_house_id')
                    ->label('Boarding House')
                    ->relationship('boardingHouse', 'name')
                    ->required(),
                Textarea::make('content')
                    ->label('Content')
                    ->rows(5)
                    ->required()
                    ->columnSpan(2),
                TextInput::make('rating')
                    ->label('Rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->required(),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
            ]);
    }
}
