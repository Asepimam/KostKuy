<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Filament\Forms\Components\Placeholder;
class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('Transaction Code')
                    ->required()
                    ->numeric(),
                Select::make('boarding_house_id')
                    ->label('Boarding House ID')
                    ->required()
                    ->relationship('boardingHouse', 'name'),
                Select::make('room_id')
                    ->label('Room ID')
                    ->required()
                    ->relationship('room', 'name')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $duration = $get('duration');
                        $room = \App\Models\Room::find($state);
                        if ($room && $duration) {
                            $price = $room->price_per_month; // pastikan di tabel `rooms` ada kolom `price_per_month`
                            $set('total_amount', $price * $duration);
                        }
                    }),
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone_number')
                    ->tel()
                    ->required(),
                Select::make('payment_method')
                    ->options(['down_payment' => 'Down payment', 'full_payment' => 'Full payment']),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'confirmed' => 'Confirmed', 'cancelled' => 'Cancelled'])
                    ->default('pending')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                TextInput::make('duration')
                    ->label('Duration (months)')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                        $room = \App\Models\Room::find($get('room_id'));
                        if ($room && $state) {
                            $price = $room->price_per_month; // pastikan di tabel `rooms` ada kolom `price_per_month`
                            $set('total_amount', $price * $state);
                        }
                    }),
                TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->readOnly(),

                DatePicker::make('transaction_date')
                    ->label('Transaction Date')
                    ->required(),
            ]);
    }
}
