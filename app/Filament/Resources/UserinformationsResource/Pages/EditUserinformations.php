<?php

namespace App\Filament\Resources\UserinformationsResource\Pages;

use App\Filament\Resources\UserinformationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserinformations extends EditRecord
{
    protected static string $resource = UserinformationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
