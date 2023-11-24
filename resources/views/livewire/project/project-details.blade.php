<div class="max-w-4xl mt-6 bg-gray-50 dark:bg-slate-800">
    <div class="px-10 py-6 mx-auto">
        <a href="#_" class="flex justify-center transition duration-200 ease-out transform hover:scale-105">
            <img class="object-cover max-w-2xl shadow-sm" src="{{ asset('storage/' . $project->image) }}">
        </a>

        <div class="mt-6">
            <h1 class="sm:text-3xl md:text-3xl lg:text-3xl xl:text-4xl font-bold text-green-600">{{ $project->title }}
            </h1>
        </div>

        <div class="flex justify-end font-light text-gray-900 dark:text-white">
            <a href="#" class="mt-6 mb-6">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($project->createdByUser()->name) }}&color=4d7c0f"
                    alt="avatar" class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block">
                <h1 class="font-bold hover:underline">Por {{ $project->createdByUser()->name }}</h1>
                <small>{{ $project->created_at->diffForHumans() }}</small>
            </a>
        </div>

        <div class="p-4 mb-6 text-gray-800 dark:text-white">
            {!! $project->description !!}
        </div>
    </div>
</div>
