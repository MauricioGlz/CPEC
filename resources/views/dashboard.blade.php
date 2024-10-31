<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-2">
            <h2 class="font-semibold text-xl leading-tight">
                {{ __('welcome.Home') }}
            </h2>
            <h2 class="font-semibold text-xl leading-tight"
            x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" 
            x-on:profile-updated.window="name = $event.detail.name">
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-3 px-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grow md:flex-1">
                    <div class="flex flex-col px-4 sm:px-3 lg:px-4 py-2 gap-2 h-24">
                        <div>
                            <p class="font-semibold text-lg text-blue-400">Registrar estudiante</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">
                                Aqui puedes crear el registro de estudiantes para catecismo, solo deberas llenar el formulario.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 py-2 text-right">
                        <x-primary-button> 
                            <a href="students/new">Abrir</a>
                        </x-primary-button>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grow md:flex-1">
                    <div class="flex flex-col px-4 sm:px-3 lg:px-4 py-2 gap-2 h-24">
                        <div>
                            <p class="font-semibold text-lg text-blue-400">Ver alumnos asignados</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">
                                Aqui puedes ver la lista de alumnos asignados a tu grupo.
                            </p>
                        </div>
                    </div>
                    <div class="px-4 py-2 text-right">
                        <x-primary-button> 
                            <a href="/">Abrir</a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
