<?php

namespace App\Filament\Admin\Resources\ProplemResource\Pages;

use App\Filament\Admin\Resources\ProplemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProplem extends EditRecord
{
    protected static string $resource = ProplemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
