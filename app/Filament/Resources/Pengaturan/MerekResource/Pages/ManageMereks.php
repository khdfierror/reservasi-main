<?php

namespace App\Filament\Resources\Pengaturan\MerekResource\Pages;

use App\Filament\Resources\Pengaturan\MerekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMereks extends ManageRecords
{
    protected static string $resource = MerekResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
