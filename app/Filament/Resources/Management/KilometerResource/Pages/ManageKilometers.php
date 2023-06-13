<?php

namespace App\Filament\Resources\Management\KilometerResource\Pages;

use App\Filament\Resources\Management\KilometerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKilometers extends ManageRecords
{
    protected static string $resource = KilometerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
