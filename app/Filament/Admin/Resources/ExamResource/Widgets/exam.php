<?php

namespace App\Filament\Admin\Resources\ExamResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\exam as model;

class exam extends BaseWidget
{
    public $exam ;
    public function mount(model $exam): void
    {
        $this->exam = $exam;
    }
    protected function getStats(): array
    {
        return [
            Stat::make(__("all.exam"), $this->exam->name)
            ->description(__("all.exam"))
            ->descriptionIcon("heroicon-o-book-open")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
            Stat::make(__("all.users"), $this->exam->degre()->count())
            ->description(__("all.count"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
     
            Stat::make(__("all.opeside"), $this->exam->opeside->name)
            ->description(__("all.name"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ,
        ];
    }
}
