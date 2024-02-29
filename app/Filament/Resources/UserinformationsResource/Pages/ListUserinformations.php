<?php

namespace App\Filament\Resources\UserinformationsResource\Pages;

use App\Filament\Resources\UserinformationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserinformations extends ListRecords
{
    protected static string $resource = UserinformationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
