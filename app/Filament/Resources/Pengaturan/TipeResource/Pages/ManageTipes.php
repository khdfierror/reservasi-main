<?php

namespace App\Filament\Resources\Pengaturan\TipeResource\Pages;

use App\Filament\Resources\Pengaturan\TipeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTipes extends ManageRecords
{
    protected static string $resource = TipeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
