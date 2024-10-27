<?php

namespace App\Livewire;

use Livewire\Component;

class VideoPlayer extends Component
{
    public $videoUrl;

    public  function mount($videoUrl)
    {
        $this->videoUrl = $videoUrl;
    }
    public function render()
    {
        return view('livewire.video-player',[
            'videoUrl' => $this->videoUrl,
        ]);
    }
}
