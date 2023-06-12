<?php

namespace App\Filament\Resources\Pengaturan\BrandResource\Pages;

use App\Filament\Resources\Pengaturan\BrandResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBrands extends ManageRecords
{
    protected static string $resource = BrandResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
