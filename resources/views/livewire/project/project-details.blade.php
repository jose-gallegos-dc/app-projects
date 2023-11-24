<div class="mt-6 bg-gray-50">
    <div class="max-w-4xl px-10 py-6 mx-auto bg-gray-50">

        <a href="#_" class="flex justify-center block transition duration-200 ease-out transform hover:scale-105">
            <img class="object-cover w-full shadow-sm h-full" src="{{ asset('storage/' . $project->image) }} ">
        </a>

        <div class="mt-6">
            <h1 class="sm:text-3xl md:text-3xl lg:text-3xl xl:text-4xl font-bold text-green-500">{{ $project->title }}
            </h1>
        </div>

        <div class="flex justify-end font-light text-gray-600">
            <a href="#" class="mt-6 mb-6">
                <img src="https://avatars.githubusercontent.com/u/71964085?v=4" alt="avatar"
                    class="hidden object-cover w-14 h-14 mx-4 rounded-full sm:block">
                <h1 class="font-bold text-gray-700 hover:underline">Por {{ $project->createdByUser()->name }}</h1>
                <small>{{ $project->created_at->diffForHumans() }}</small>
            </a>
        </div>

        <div class="p-4 mb-6">
            {{ $project->description }}
        </div>
    </div>
</div>
