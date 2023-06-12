<?php

namespace App\Filament\Resources\Pengaturan\UserResource\Pages;

use App\Filament\Resources\Pengaturan\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getTitle(): string
    {
        return trans('filament-user::user.resource.title.create');
    }
}
