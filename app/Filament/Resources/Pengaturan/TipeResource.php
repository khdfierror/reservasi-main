<?php

namespace App\Filament\Resources\Pengaturan;

use App\Filament\Resources\Pengaturan\TipeResource\Pages;
use App\Filament\Resources\Pengaturan\TipeResource\RelationManagers;
use App\Models\System\Brand;
use App\Models\System\Tipe;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipeResource extends Resource
{
    protected static ?string $model = Tipe::class;

    protected static ?string $navigationIcon = 'carbon-model-alt';

    protected static function getNavigationLabel(): string
    {
        return "Tipe";
    }

    public static function getPluralLabel(): string
    {
        return "Tipe";
    }

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $slug = 'system/tipe';

    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Select::make('brand_id')
            ->label('Brand')
            ->relationship('brand', 'nama')
            ->required(),

            Forms\Components\TextInput::make('nama')
            ->label('Nama')
            ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),   
                Tables\Columns\TextColumn::make('brand.nama'),
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
            'index' => Pages\ManageTipes::route('/'),
        ];
    }    
}
