<?php

namespace App\Filament\Resources\Pengaturan;

use App\Filament\Resources\Pengaturan\WarnaResource\Pages;
use App\Filament\Resources\Pengaturan\WarnaResource\RelationManagers;
use App\Models\System\Tipe;
use App\Models\System\Warna;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WarnaResource extends Resource
{
    protected static ?string $model = Warna::class;

    protected static ?string $navigationIcon = 'carbon-color-palette';

    protected static function getNavigationLabel(): string
    {
        return "Warna";
    }

    public static function getPluralLabel(): string
    {
        return "Warna";
    }

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $slug = 'system/warna';

    protected static ?int $navigationSort = 5;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tipe_id')
                ->label('Tipe')
                ->relationship('tipe', 'nama'),

                Forms\Components\TextInput::make('nama')
                ->label('Nama')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipe.nama'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWarnas::route('/'),
        ];
    }    
}
