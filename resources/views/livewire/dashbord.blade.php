
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
    @if(auth()->user()->courses()->where("courses.id", $course->id)->exists())
    <button class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 " >
      {{__("all.yourJoin")}}
    </button>
    @else
    <button class="bg-primary-600 text-white rounded-lg px-6 py-2 mt-4 hover:bg-primary-700 transition-colors duration-300 " wire:click="joinCourse({{$course->id}})">
      {{__("all.join")}}
    </button>
    @endif
  </div>
</div>

  @endforeach

    </div>
</div>

