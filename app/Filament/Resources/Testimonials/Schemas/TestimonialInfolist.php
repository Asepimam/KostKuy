<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Name'),
                TextEntry::make('boardingHouse.name')
                    ->label('Boarding House'),  
                ImageEntry::make('photo')
                    ->label('Photo'),
                TextEntry::make('rating')
                    ->label('Rating'),
                TextEntry::make('content')
                    ->label('Content')
            ]);
    }
}
