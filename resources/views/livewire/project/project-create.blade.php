<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyecto nuevo') }}
        </h2>
    </x-slot>

    @if (session()->has('message'))
        <div
            class="mt-4 font-regular relative block w-full rounded-lg bg-green-400 p-4 text-base leading-5 text-gray-700 opacity-100">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div
            class="mt-4 font-regular relative block w-full rounded-lg bg-red-400 p-4 text-base leading-5 text-gray-700 opacity-100">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        <form wire:submit.prevent="storeProject" enctype="multipart/form-data">

                            <div x-data="{ isActive: @entangle('is_active') }">
                                <div class="inline-flex items-center">
                                    <div class="relative inline-block h-4 w-8 cursor-pointer rounded-full">
                                        <input id="auto-update" x-model="isActive" wire:model="is_active"
                                            type="checkbox"
                                            class="peer absolute h-4 w-8 cursor-pointer appearance-none rounded-full bg-blue-gray-100 transition-colors duration-300 checked:bg-green-500 peer-checked:border-green-500 peer-checked:before:bg-green-500" />
                                        <label for="auto-update"
                                            class="before:content[''] absolute top-2/4 -left-1 h-5 w-5 -translate-y-2/4 cursor-pointer rounded-full border border-blue-gray-100 bg-white shadow-md transition-all duration-300 before:absolute before:top-2/4 before:left-2/4 before:block before:h-10 before:w-10 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 peer-checked:translate-x-full peer-checked:border-green-500 peer-checked:before:bg-green-500">
                                            <div class="top-2/4 left-2/4 inline-block -translate-x-2/4 -translate-y-2/4 rounded-full p-5"
                                                data-ripple-dark="true"></div>
                                        </label>
                                    </div>
                                    <label for="auto-update"
                                        class="mt-px ml-3 mb-0 cursor-pointer select-none font-light text-gray-700 dark:text-gray-50"
                                        x-text="isActive ? 'Público' : 'Borrador'">
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-center">
                                <div class="w-72">
                                    <!-- Contenedor para la vista previa de la imagen -->
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Vista previa de la imagen"
                                            class="rounded-md max-w-full object-cover">
                                    @else
                                        <span class="text-justify">No hay imagen seleccionada</span>
                                    @endif

                                    <input wire:model="image" name="image" id="image" type="file"
                                        class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                        accept="image/*">
                                    @error('image')
                                        <span class="text-pink-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <span for="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                    Título
                                </span>
                                <input wire:model="title" name="title" id="title" type="text"
                                    class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    placeholder="Título del proyecto">
                                @error('title')
                                    <span class="text-pink-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <span for="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                    Descripción
                                </span>
                                <input wire:model="description" name="description" id="description" type="text"
                                    class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    placeholder="0.00">
                                @error('description')
                                    <span class="text-pink-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <span for="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                    Descripción
                                </span>

                                <div class="flex flex-col space-y-10 mt-2">

                                    <div wire:ignore class="border-gray-300 dark:border-gray-700">
                                        <textarea wire:model="description" class="min-h-fit h-48 " name="description" id="description"></textarea>
                                    </div>

                                    <div>
                                        <span class="text-lg">You typed:</span>
                                        <div class="w-full min-h-fit h-48 border border-gray-200">{{ $description }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end my-5">
                                <button type="submit"
                                    class="inline-block rounded bg-neutral-700 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]">
                                    Crear proyecto
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
