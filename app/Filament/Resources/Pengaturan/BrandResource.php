<?php

namespace App\Filament\Resources\Pengaturan;

use App\Filament\Resources\Pengaturan\BrandResource\Pages;
use App\Filament\Resources\Pengaturan\BrandResource\RelationManagers;
use App\Models\System\Merek;
use App\Models\System\Brand;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'carbon-carbon';

    protected static function getNavigationLabel(): string
    {
        return "Brand";
    }

    public static function getPluralLabel(): string
    {
        return "Brand";
    }

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $slug = 'system/brand';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('merek_id')
                ->label('Merek')
                ->relationship('merek', 'nama'),

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
                Tables\Columns\TextColumn::make('merek.nama'),
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
            'index' => Pages\ManageBrands::route('/'),
        ];
    }    
}
