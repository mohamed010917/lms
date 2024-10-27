<?php

namespace App\Filament\Admin\Resources\CourseResource\Pages;

use App\Filament\Admin\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\admin\Resources\CourseResource\Widgets\course::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return [

            \App\Filament\admin\Resources\CourseResource\Widgets\topcourse::make(),
        ];
    }
}
