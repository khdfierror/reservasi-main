<?php

namespace App\Filament\Resources\Pengaturan\TahunproduksiResource\Pages;

use App\Filament\Resources\Pengaturan\TahunproduksiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTahunproduksis extends ManageRecords
{
    protected static string $resource = TahunproduksiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
