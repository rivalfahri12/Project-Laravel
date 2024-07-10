<?php

namespace App\Filament\Resources\HubunganResource\Pages;

use App\Filament\Resources\HubunganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHubungan extends EditRecord
{
    protected static string $resource = HubunganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
