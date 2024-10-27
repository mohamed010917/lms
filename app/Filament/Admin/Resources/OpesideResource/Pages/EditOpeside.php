<?php

namespace App\Filament\Admin\Resources\OpesideResource\Pages;

use App\Filament\Admin\Resources\OpesideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpeside extends EditRecord
{
    protected static string $resource = OpesideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
