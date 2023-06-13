<?php

namespace App\Filament\Resources\Management\MobilResource\Pages;

use App\Filament\Resources\Management\MobilResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMobils extends ManageRecords
{
    protected static string $resource = MobilResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
