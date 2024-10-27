<?php

namespace App\Filament\Admin\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use Carbon\Carbon;
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__("all.usersst"), User::count())
            ->description(__("all.usersde"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make(__("all.userpay"), User::where("pay","!=",null)->count())
            ->description(__("all.bay"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([70, 20, 30, 3, 15, 4, 17])
            ,
            Stat::make(__("all.usercreattody"),User::whereDate('created_at', Carbon::today())->count())
            ->description(__("all.usersde"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([70, 20, 30, 3, 100, 4, 17])
            ,
        ];
    }
}
