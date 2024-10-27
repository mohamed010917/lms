<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\course;
use App\Models\opeside;
class dashbordStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__("all.usersst"), User::count())
            ->description(__("all.usersde"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make(__("all.courses"), course::count())
            ->description(__("all.courses"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make(__("all.opesides"), opeside::count())
            ->description(__("all.courses"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
        ];
    }
}
