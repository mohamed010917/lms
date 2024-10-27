<?php

namespace App\Filament\Admin\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Course as c;
class course extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__("all.courses"), c::count())
            ->description(__("all.courses"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
           
        ];
    }
    public function getColumns(): int 
    {
        return 3;
    }
}
