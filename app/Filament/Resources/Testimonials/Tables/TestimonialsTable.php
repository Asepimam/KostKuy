<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('User Name'),
                TextColumn::make('rating')->sortable()->searchable()->label('Rating'),
                TextColumn::make('content')->sortable()->searchable()->label('Comment')->limit(50),
                TextColumn::make('boardingHouse.name')->label('Boarding House')->sortable()->searchable(),
            ])
            ->filters([
                Filter::make('boarding_house_id')
                    ->label('Boarding House')
                    ->form([
                        Select::make('boarding_house_id')
                            ->relationship('boardingHouse', 'name')
                            ->searchable()
                            ->placeholder('Select Boarding House'),
                    ])
                    ->query(function ($query, $data) {
                        return $query->when($data['boarding_house_id'], function ($query, $boarding_house_id) {
                            $query->where('boarding_house_id', $boarding_house_id);
                        });
                    }),
                // Filter::make('rating')
                //     ->label('Rating')
                //     ->form([
                //         TextColumn::make('rating')->numeric(),
                //     ])
                //     ->query(function ($query, $data) {
                //         return $query->where('rating', $data['rating']);
                //     }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
