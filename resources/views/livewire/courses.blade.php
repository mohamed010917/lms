<div>
  
@if($bage == null)
<div class="container mx-auto p-4">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
@foreach($courses as $course)
<div class="conten rounded-lg bg-primary-50 dark:bg-primary-900 overflow-hidden p-4 shadow-lg">
<!-- Image Section -->
<div class="img w-full h-48">
<img src="{{ Storage::url($course->image)  }}" alt="Course Image" class="w-full h-full object-cover rounded-lg" loading="lazy">
</div>

<!-- Title Section -->
<h2 class="p-2 mt-4 mb-2 text-xl font-bold text-primary-800 dark:text-primary-100">
{{ $course->name }}
</h2>

<!-- Buttons Section -->
<div class="butons text-center">

<button class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 " wire:click="delete({{$course->id}})">
  {{__("all.delete")}}
</button>
<button class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 " wire:click="go({{$course->id}})">
  {{__("all.go")}}
</button>

</div>
</div>

@endforeach

</div>
</div>
@elseif($bage == 1)
<button wire:click="back"  class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 ">{{__("all.courses")}}</button>
<div class="container mx-auto p-4">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
@foreach($course->opeside()->get() as $course)
<div class="conten rounded-lg bg-primary-50 dark:bg-primary-900 overflow-hidden p-4 shadow-lg">
<!-- Image Section -->
<div class="img w-full h-48">
<img src="{{ Storage::url($course->image)  }}" alt="Course Image" class="w-full h-full object-cover rounded-lg" loading="lazy">
</div>

<!-- Title Section -->
<h2 class="p-2 mt-4 mb-2 text-xl font-bold text-primary-800 dark:text-primary-100">
{{ $course->name }}
</h2>

<!-- Buttons Section -->
<div class="butons text-center">
<button class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 " wire:click="goOpeside({{$course->id}})">
  {{__("all.go")}}
</button>
</div>
</div>

@endforeach
</div>
</div>
@elseif($bage == 2)
<button wire:click="back"  class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 ">{{__("all.courses")}}</button>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://vjs.zencdn.net/7.21.8/video-js.css" rel="stylesheet" />
    <title>Video Player Example</title>
    <style>
        .video-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            
        }
    </style>
</head>
<body>

<div class="video-container">
    <video
        id="my-video"
        class="video-js"
        controls
        preload="auto"
        width="640"
        height="264"
        data-setup="{}"
    >
        <source src="{{Storage::url($course->video)  }}" type="video/mp4" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="https://www.google.com/chrome/">supports HTML5 video</a>
        </p>
    </video>
</div>

<script src="https://vjs.zencdn.net/7.21.8/video.min.js"></script>
</body>
</html>

@endif
</div>
