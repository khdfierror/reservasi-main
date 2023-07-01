<?php

namespace App\Filament\Resources\Management;

use App\Filament\Resources\Management\ReservasiResource\Pages;
use App\Filament\Resources\Management\ReservasiResource\RelationManagers;
use App\Models\Service\Reservasi;
use App\Models\User;
use App\Models\System\Merek;
use App\Models\Service\Mobil;
use App\Models\Service\Kilometer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'carbon-settings-services';

    protected static function getNavigationLabel(): string
    {
        return "Reservasi";
    }

    public static function getPluralLabel(): string
    {
        return "Reservasi";
    }

    protected static ?string $navigationGroup = 'Service Management';

    protected static ?string $slug = 'management/reservasi';

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
                ->hidden(!$user->hasRole('super_admin')),
            

                Forms\Components\TextInput::make('no_handphone')
                ->label('No HandPhone')
                ->required()
                ->hidden(!$user->hasRole('super_admin')),


                Forms\Components\Select::make('merek_id')
                ->label('Merek')
                ->options(Merek::all()->pluck('nama', 'id')->toArray())
                ->required()
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('mobil_id', null)),

                Forms\Components\Select::make('mobil_id')
                ->label('Mobil')
                ->options(function (callable $get) {
                    $merek = Merek::find($get('merek_id'));
                    if (!$merek) {
                        return null;
                    }
                    return $merek->mobil->pluck('no_rangka', 'id');
                }),

                
                Forms\Components\Select::make('kilometer_id')
                ->label('Service Berkala')
                ->options(Kilometer::all()->pluck('nama', 'id')->toArray())
                ->required(),

                Forms\Components\DatePicker::make('tgl_service')
                ->label('Tanggal Servis')
                ->required(),

                Forms\Components\TimePicker::make('waktu')
                ->label('Pilih Waktu')
                ->required(),



            ]);
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

                Tables\Columns\TextColumn::make('no_handphone')
                    ->label('No Handphone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('merek.nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('mobil.no_rangka')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kilometer.nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tgl_service')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('waktu')
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
            'index' => Pages\ManageReservasis::route('/'),
        ];
    }    
}



