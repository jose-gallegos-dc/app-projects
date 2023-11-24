<div class="flex flex-col">
    <div class="h-full grid grid-flow-row gap-4 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($projects as $project)
            <div
                class="w-max-80 rounded-t-lg my-8 mx-4 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1 relative">
                <a href="{{ url('/proyecto/' . $project->slug) }}" class="flex justify-center">
                    <img class="rounded-t-lg max-h-72" src="{{ asset('storage/' . $project->image) }}" alt="img-project" />
                </a>

                <div
                    class="absolute inset-0 bg-black bg-opacity-50 text-white opacity-0 hover:opacity-100 transition-opacity duration-300">
                    <div class="flex flex-col h-full justify-end p-6">
                        <h5 class="mb-2 text-xl font-medium leading-tight">
                            {{ $project->title }}
                        </h5>
                        <p class="mb-4 text-base">
                            {{-- {!! $project->description !!} --}}
                            {!! Str::limit($project->description, 30) !!}
                        </p>
                        <a href="{{ url('/proyecto/' . $project->slug) }}"
                            class="mt-3 text-white hover:text-green-600 inline-flex items-center">
                            Leer más
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="p-5">
        {{ $projects->links() }}
    </div>
</div>
