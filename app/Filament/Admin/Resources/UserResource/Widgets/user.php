<?php

namespace App\Filament\Admin\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User as model ;
class user extends BaseWidget
{
    public $user ;
    public function mount(model $user): void
    {
        $this->user = $user;
    }

    protected function getStats(): array
    {
        return [
            Stat::make(__("all.courses"), $this->user->courses()->count())
            ->description(__("all.courses"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make(__("all.exams"), $this->user->degre()->count())
            ->description(__("all.exams"))
            ->descriptionIcon("heroicon-o-users")
            ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }
}
