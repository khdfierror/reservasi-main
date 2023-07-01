<?php

namespace App\Filament\Resources\Management\ReservasiResource\Pages;

use App\Filament\Resources\Management\ReservasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReservasis extends ManageRecords
{
    protected static string $resource = ReservasiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
