<?php

namespace App\Filament\Admin\Resources\CourseResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\course ;

class viewcourse extends BaseWidget
{
    public $course ;
    public function mount(course $course): void
    {
        $this->course = $course;
    }
    protected function getStats(): array
    {
        return [
            Stat::make(__("all.name"), $this->course->name)
            ->description(__("all.course"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,


            Stat::make(__("all.countopeside"),$this->course->opeside()->count())
            ->description(__("all.opeside"))
            ->descriptionIcon("heroicon-o-video-camera")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,


            Stat::make(__("all.users"), $this->course->users()->count())
            ->description(__("all.countuser"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
        ];
    }
}
