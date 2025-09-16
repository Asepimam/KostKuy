<?php

namespace App\Filament\Resources\BoardingHouses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Str;
use Filament\Support\RawJs;

class BoardingHouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')
                ->tabs([
                    Tab::make('General')
                        
                        ->schema([
                                FileUpload::make('thumbnail')
                                        ->required()
                                        ->label('Thumbnail Image')
                                        ->image()
                                        ->maxSize(1024)
                                        ->directory('assets/boarding-houses')
                                        ->visibility('public')
                                        ->columnSpan(['md' => 2]),
                                TextInput::make('name')
                                        ->label('Boarding House Name')
                                        ->required()
                                        ->reactive()
                                        ->debounce(500)
                                        ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                        ->label('Boarding House Slug')
                                        ->required()
                                        ->unique(ignoreRecord: true),
                                Select::make('category_id')
                                        ->label('Boarding House Category')
                                        ->relationship('category', 'name')
                                        ->required(),
                                Select::make('city_id')
                                        ->label('Boarding House City')
                                        ->relationship('city', 'name')
                                        ->required(),
                                TextInput::make('price')
                                        ->label('Price')
                                        //menambahkan IDR didepan
                                        ->prefix('IDR ')
                                        //Tambahkan . ketika ribuan menggunakan mask
                                        ->mask(RawJs::make('$money($input)'))
                                        ->stripCharacters(',')
                                        ->required()
                                        ->numeric(),
                                Textarea::make('address')
                                        ->label('Address')
                                        ->required()
                                        ->columnSpan(['md' => 2]),
                                RichEditor::make('description')
                                        ->label('Description')
                                        ->required()
                                        ->columnSpan(['md' => 2])
                                        ->maxLength(65535),
                        ]),
                        Tab::make('Bonus')
                        ->schema([
                                Repeater::make('bonuses')
                                        ->relationship('bonuses')
                                        ->schema([
                                                FileUpload::make('image')
                                                        ->label('Bonus Image')
                                                        ->required()
                                                        ->image()
                                                        ->maxSize(1024)
                                                        ->columnSpan(['md' => 2]),
                                                TextInput::make('name')->required()->label('Bonus Name'),
                                                Textarea::make('description')->required()->label('Bonus Description'),
                                    ])
                                    ->columns(2)
                        ]),
                    Tab::make('Rooms')
                        ->schema([
                            Repeater::make('rooms')
                                ->relationship('rooms')
                                ->schema([
                                        TextInput::make('name')->required()->label('Room Name'),
                                        TextInput::make('room_type')
                                                ->label('Room Type')
                                                ->required()
                                                ->helperText('e.g. Single, Double, Suite, etc.'),
                                        TextInput::make('square_feet')
                                                ->label('Square Feet')
                                                ->required()
                                                ->numeric(),
                                        TextInput::make('capacity')
                                                ->label('Capacity')
                                                ->required()
                                                ->numeric(),
                                        TextInput::make('price_per_month')
                                                ->label('Price Per Month')
                                                ->prefix('IDR ')
                                                ->mask(RawJs::make('$money($input)'))
                                                ->stripCharacters(',')
                                                ->required()
                                                ->numeric(),
                                        Toggle::make('is_available')
                                                ->label('Available')
                                                ->default(true)
                                                ->inline(false)
                                                ->required(),
                                       Repeater::make('roomImages')
                                        ->relationship('images')
                                        ->schema([
                                                FileUpload::make('image')
                                                        ->label('Room Image')
                                                        ->required()
                                                        ->image()
                                                        ->maxSize(1024)
                                                        ->columnSpan(['md' => 2]),
                                        ])
                                ])
                                ->columns(2)
                        ]),
                ])
                ->columnSpan(['md' => 2]),
            ]);
    }
}
