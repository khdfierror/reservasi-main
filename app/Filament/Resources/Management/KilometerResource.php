<?php

namespace App\Filament\Resources\Management;

use App\Filament\Resources\Management\KilometerResource\Pages;
use App\Filament\Resources\Management\KilometerResource\RelationManagers;
use App\Models\Service\Kilometer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KilometerResource extends Resource
{
    protected static ?string $model = Kilometer::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'carbon-forward-10';

    protected static function getNavigationLabel(): string
    {
        return "Kilometer";
    }

    public static function getPluralLabel(): string
    {
        return "Kilometer";
    }

    protected static ?string $navigationGroup = 'Service Management';

    protected static ?string $slug = 'management/kilometer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->label('Kilometer')
                ->maxLength(255)
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKilometers::route('/'),
        ];
    }    
}
