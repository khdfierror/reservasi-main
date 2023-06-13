<?php

namespace App\Filament\Resources\Pengaturan;

use App\Filament\Resources\Pengaturan\TahunproduksiResource\Pages;
use App\Filament\Resources\Pengaturan\TahunproduksiResource\RelationManagers;
use App\Models\System\Tipe;
use App\Models\System\Tahunproduksi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahunproduksiResource extends Resource
{
    protected static ?string $model = Tahunproduksi::class;

    protected static ?string $navigationIcon = 'carbon-calendar';

    protected static function getNavigationLabel(): string
    {
        return "Tahun Produksi";
    }

    public static function getPluralLabel(): string
    {
        return "Tahun Produksi";
    }

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $slug = 'system/tahunproduksi';

    protected static ?int $navigationSort = 4;

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
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
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
            'index' => Pages\ManageTahunproduksis::route('/'),
        ];
    }    
}
