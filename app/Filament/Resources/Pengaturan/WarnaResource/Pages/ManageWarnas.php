<?php

namespace App\Filament\Resources\Pengaturan\WarnaResource\Pages;

use App\Filament\Resources\Pengaturan\WarnaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWarnas extends ManageRecords
{
    protected static string $resource = WarnaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
