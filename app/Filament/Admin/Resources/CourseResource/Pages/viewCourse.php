<?php

namespace App\Filament\Admin\Resources\CourseResource\Pages;

use App\Filament\Admin\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\group;
use Filament\Infolists\Components\ImageEntry;
class viewCourse extends ViewRecord
{
    protected static string $resource = CourseResource::class;
    public  function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                group::make()
                ->schema([
                    section::make(__("all.informtion"))
                    ->schema([
                        TextEntry::make("name")->label(__("all.name")),
                        TextEntry::make("discriper")->label(__("all.discriper")),
                        TextEntry::make("descrption")->label(__("all.descrption")),
                    ])->columns(2)
                    ]),
                group::make()
                ->schema([
                    ImageEntry::make('image')
                    ->defaultImageUrl(asset('langImgs/ar.jpeg'))
                    ->extraImgAttributes([
                        'alt' => 'Logo',
                        'loading' => 'lazy',
                    ])->height(200)
                ])
            ]);
    }


    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\admin\Resources\CourseResource\Widgets\viewcourse::make(["course" => $this->record]),
        ];
    }
}
