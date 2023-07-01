<?php

namespace App\Filament\Resources\Management;

use App\Filament\Resources\Management\MobilResource\Pages;
use App\Filament\Resources\Management\MobilResource\RelationManagers;
use App\Models\System\Merek;
use App\Models\System\Brand;
use App\Models\System\Tipe;
use App\Models\Service\Mobil;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SofDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'carbon-taxi';

    protected static function getNavigationLabel(): string
    {
        return "Mobil";
    }

    public static function getPluralLabel(): string
    {
        return "Mobil";
    }

    protected static ?string $navigationGroup = 'Service Management';

    protected static ?string $slug = 'management/mobil';

    public static function form(Form $form): Form
    {
        $user = auth()->user();
        
        return $form
            ->schema([

                

                Forms\Components\Select::make('user_id')
                ->label('User')
                ->options(User::all()->pluck('name', 'id')->toArray())
                ->required()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('merek_id', null))
                ->hidden(!$user->hasRole('super_admin') ),
            

                Forms\Components\Select::make('merek_id')
                ->label('Merek')
                ->options(Merek::all()->pluck('nama', 'id')->toArray())
                ->required()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('brand_id', null)),

                Forms\Components\Select::make('brand_id')
                ->label('Brand')
                ->options(function (callable $get) {
                    $merek = Merek::find($get('merek_id'));
                    if (!$merek) {
                        return null;
                    }
                    return $merek->brand->pluck('nama', 'id');

                })
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('tipe_id', null)),

                Forms\Components\Select::make('tipe_id')
                ->label('Tipe')
                ->required()
                ->options(function (callable $get) {
                    $brand = Brand::find($get('brand_id'));
                    if (!$brand) {
                        return null;
                    }
                    return $brand->tipe->pluck('nama', 'id');

                })
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('tahunproduksi_id', null)),
                
                Forms\Components\Select::make('tahunproduksi_id')
                ->label('Tahun Produksi')
                ->options(function (callable $get) {
                    $tipe = Tipe::find($get('tipe_id'));
                    if (!$tipe) {
                        return null;
                    }
                    return $tipe->tahunproduksi->pluck('nama', 'id');
                })
                ->required()
                ->reactive(),

                Forms\Components\Select::make('warna_id')
                ->label('Warna')
                ->options(function (callable $get) {
                    $tipe = Tipe::find($get('tipe_id'));
                    if (!$tipe) {
                        return null;
                    }
                    return $tipe->warna->pluck('nama', 'id');
                })
                ->required()
                ->reactive(),

                Forms\Components\TextInput::make('no_polisi')
                ->label('Nomor Polisi')
                ->maxLength(255)
                ->required(),

                Forms\Components\TextInput::make('no_rangka')
                ->label('Nomor Rangka')
                ->maxLength(255)
                ->required(),

                Forms\Components\DatePicker::make('expired_stnk')
                ->label('Expired STNK')
                ->required()



            ]);

        // if ($user->role === 'super_admin') {
        //     Forms\Components\Select::make('user_id')
        //         ->label('User')
        //         ->options(User::all()->pluck('name', 'id')->toArray())
        //         ->required()
        //         ->reactive()
        //         ->afterStateUpdated(fn (callable $set) => $set('merek_id', null));
        // }

        // return null;


    }

    public static function table(Table $table): Table
    {
        $user = auth()->user();
        
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->hidden(!$user->hasRole('super_admin')),
                Tables\Columns\TextColumn::make('merek.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahunproduksi.nama')
                    ->label('Tahun Produksi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('warna.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_polisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_rangka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expired_stnk')
                    ->searchable(),
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
            'index' => Pages\ManageMobils::route('/'),
        ];
    }    
}
