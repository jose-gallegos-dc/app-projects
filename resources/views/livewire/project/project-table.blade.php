<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">Título</th>
                                <th scope="col" class="px-6 py-4">Autor</th>
                                <th scope="col" class="px-6 py-4">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        {{ $project->id }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $project->title }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $project->createdByUser()->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $project->is_active ? 'Publicado' : 'Borrador' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{ $projects->links() }}
</div>
