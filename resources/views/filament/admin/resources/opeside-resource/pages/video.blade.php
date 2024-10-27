<x-filament-panels::page>
<div class="max-w-4xl mx-auto mt-10 p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg transition-colors duration-300">
    <!-- Video Section -->
    <div class="relative w-full  bg-black rounded-lg overflow-hidden" style="height: 350px;">
        <video class="absolute top-0 left-0 w-full h-full object-cover" controls>
            <source src="{{ Storage::url($record->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Video Details -->
    <div class="mt-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 transition-colors duration-300">{{$record->name}}</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-300 transition-colors duration-300">
        {{$record->descrption}}
        </p>     
    </div>
</div>

</x-filament-panels::page>
