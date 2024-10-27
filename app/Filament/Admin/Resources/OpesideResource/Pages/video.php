<?php

namespace App\Filament\Admin\Resources\OpesideResource\Pages;

use App\Filament\Admin\Resources\OpesideResource;
use Filament\Resources\Pages\Page;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

use Filament\Infolists;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\group;
use App\Filament\Admin\Resources\OpesideResource\RelationManagers\FilesRelationManager;
use Filament\Infolists\Components\ImageEntry;
use App\Livewire\VideoPlayer;
use App\Filament\Resources\OpenFundsPatternResource;
use App\Filament\admin\Resources\OpesideResource\Pages\video;

use Filament\Resources\Pages\ManageRecords;
use App\Models\opeside;



class video extends Page 
{
    
    protected static string $resource = OpesideResource::class;
    public  $videoUrl ;
    public $record;
    protected static string $view = 'filament.admin.resources.opeside-resource.pages.video';
    public  function mount()
    {
        $this->record = opeside::findOrFail($this->record);      
    }
    protected function getHeaderWidgets(): array
    {
        
        return [
            \App\Filament\admin\Resources\OpesideResource\Widgets\view::make(["opeside" =>$this->record]),
        ];
    }

}
