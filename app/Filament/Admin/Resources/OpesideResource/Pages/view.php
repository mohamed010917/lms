<?php

namespace App\Filament\Admin\Resources\OpesideResource\Pages;

use App\Filament\Admin\Resources\OpesideResource;
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
use App\Livewire\VideoPlayer;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Admin\Resources\OpesideResource\Pages;
// use Filament\Actions;
use App\Filament\Resources\OpenFundsPatternResource;
use App\Filament\admin\Resources\OpesideResource\Pages\video;


class view extends ViewRecord 
{
    

    protected static string $resource = OpesideResource::class;
    protected function getHeaderActions(): array
    {
        return [

        ];
    }
    protected function getHeaderWidgets(): array
    {
        
        return [
            
            \App\Filament\admin\Resources\OpesideResource\Widgets\view::make(["opeside" =>$this->record]),
        ];
    }
    public  function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                group::make()
                ->schema([
                    section::make(__("all.informtion"))
                    ->schema([
                        TextEntry::make("descrption")->label(__("all.descrption")),
    
                    ])->columns(1)
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


}

