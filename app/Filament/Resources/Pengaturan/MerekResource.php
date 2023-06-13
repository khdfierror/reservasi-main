<?php

namespace App\Filament\Resources\Pengaturan;

use App\Filament\Resources\Pengaturan\MerekResource\Pages;
use App\Filament\Resources\Pengaturan\MerekResource\RelationManagers;
use App\Models\System\Merek;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MerekResource extends Resource
{
    protected static ?string $model = Merek::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'carbon-logo-yelp';

    protected static function getNavigationLabel(): string
    {
        return "Merek";
    }

    public static function getPluralLabel(): string
    {
        return "Merek";
    }

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $slug = 'system/merek';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
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
                Tables\Columns\TextColumn::make('nama'),
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
            'index' => Pages\ManageMereks::route('/'),
        ];
    }    
}
