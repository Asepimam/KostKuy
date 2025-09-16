<?php

namespace App\Filament\Resources\Cities\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class CityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('City Name'),
                TextEntry::make('slug')
                    ->label('City Slug'),
                ImageEntry::make('image')
                    ->label('City Image')
            ]);
    }
}
