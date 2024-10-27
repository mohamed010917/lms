<?php

namespace App\Filament\Admin\Resources\ExamResource\Pages;

use App\Filament\Admin\Resources\ExamResource;
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
class view extends ViewRecord
{
    protected static string $resource = ExamResource::class;
    public  function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                group::make()
                ->schema([
                    section::make(__("all.informtion"))
                    ->schema([
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
            \App\Filament\admin\Resources\ExamResource\Widgets\exam::make(["exam" => $this->record]),
        ];
    }
}
