<?php

namespace App\Filament\Admin\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class status extends BaseWidget
{
    protected static ?string $pollingInterval = null;
    protected static bool $isLazy = true;
    protected function getStats(): array
    {

        return [
            Stat::make('Unique views', '192.1k'),
        ];
    }
}
