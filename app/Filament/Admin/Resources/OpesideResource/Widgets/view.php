<?php

namespace App\Filament\Admin\Resources\OpesideResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class view extends BaseWidget
{
    public $opeside ;
    public function amount($opeside){
        $this->opeside = $opeside ;
    }

    protected function getStats(): array
    {
        return [
            Stat::make("name", $this->opeside->name)->label(__("all.name"))
            ->description(__("all.usersde"))
            ->descriptionIcon("heroicon-o-academic-cap")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make("course", $this->opeside->course->name)->label(__("all.course"))
            ->description(__("all.course"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make("views", $this->opeside->viwes)->label(__("all.views"))
            ->description(__("all.views"))
            ->descriptionIcon("heroicon-o-eye")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,

        ];
    }
}
