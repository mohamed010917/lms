<?php

use Illuminate\Support\Facades\Route;
use App\Models\comment ;
use App\Filament\Admin\Resources\OpesideResource\Pages\video ;
use App\Livewire\VideoPlayer ;
use App\Http\Controllers\meet ;
Route::get('/', function () {
    $date["comments"] = comment::take(10)->get();
    return view('welcome',$date);

});
