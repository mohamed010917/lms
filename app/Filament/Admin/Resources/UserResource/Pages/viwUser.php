<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
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
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
     
class viwUser extends ViewRecord 
{
   
    protected static string $resource = UserResource::class;
    public  function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                group::make()
                ->schema([
                    section::make(__("all.informtion"))
                    ->schema([
                        TextEntry::make("name")->label(__("all.name")),
                        TextEntry::make("email")->label(__("all.email")),
                        TextEntry::make("phone")->label(__("all.phone")),
                        TextEntry::make("pay")->label(__("all.bay"))->dateTime(),
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
            \App\Filament\admin\Resources\UserResource\Widgets\user::make(['user' => $this->record]),
        ];
    }
}
