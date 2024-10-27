<?php

namespace App\Filament\Admin\Resources\OpesideResource\Pages;

use App\Filament\Admin\Resources\OpesideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpesides extends ListRecords
{
    protected static string $resource = OpesideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
