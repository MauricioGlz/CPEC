<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    /* Students */
    public string $std_name = '';
    public string $father_surname = '';
    public string $mother_surname = '';
    public string $birthday = '';
    public int $schoollar_grade = 1;
    public bool $disability = false;
    public string $disability_type = '';
    public bool $religion_prep = false;
    public string $prev_catechisms_grade = '';
    public string $observations = '';
    public array $levels = ['Primaria', 'Secundaria', 'Preparatoria'];
    public string $level = '';
    public array $grades = [1, 2, 3, 4, 5, 6];
    public int $grade = 1;

    /* Documentation */
    public bool $birth_cert = false;
    public bool $bautizm_cert = false;
    public bool $simple_bautizm_cert = false;
    public bool $prev_course_cert = false;
    public bool $confirmation_cert = false;
    public bool $communion_cert = false;

    /* Parents */
    public string $father_name = '';
    public string $f_phone_number = '';
    public string $f_ocupation = '';
    public string $mother_name = '';
    public string $m_phone_number = '';
    public string $m_ocupation = '';
    public string $relationship_status = '';

    public function addStudent()
    {
    }
};
?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="addStudent" class="flex flex-col gap-2  sm:px-4 py-5">

        <div class="flex flex-col md:flex-col lg:flex-row gap-2 px-4 py-5">
            {{-- Niños --}}
            <div id="student-info"
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 flex flex-col md:flex-1 gap-3 flex-1">

                <p class="text-xl font-bold text-gray-700 pb-2 text-center">Datos del alumno</p>
                <!-- Name -->
                <div>
                    <x-input-label for="std_name" :value="__('welcome.Student name')" />
                    <x-text-input wire:model="std_name" id="std_name" class="block mt-1 w-full" type="text"
                        name="std_name" required autofocus />
                </div>

                {{-- Apellido paterno --}}
                <div>
                    <x-input-label for="father_surname" :value="__('welcome.Father Surname')" />
                    <x-text-input id="father_surname" class="block mt-1 w-full" type="text" name="father_surname"
                        wire:model="father_surname" required autofocus />
                </div>

                {{-- Apellido materno --}}
                <div>
                    <x-input-label for="mother_surname" :value="__('welcome.Mother Surname')" />
                    <x-text-input id="mother_surname" class="block mt-1 w-full" type="text" name="mother_surname"
                        wire:mode="mother_surname" required autofocus />
                </div>

                {{-- Cumpleaños --}}
                <div>
                    <x-input-label for="birthday" :value="__('welcome.Birthday')" />
                    <x-text-input id="birthday" class="block mt-1 w-full" type="text" birthday="name"
                        wire:model="birthday" required autofocus />
                </div>

                {{-- Grado level --}}
                <div class="flex gap-3">
                    <div>
                        <x-input-label for="level" :value="__('welcome.School level')" />
                        <select name="level" id="level" wire:model.change="level" class="rounded-md"> Grado
                            escolar
                            @foreach ($levels as $level)
                                <option value="{{ $level }}">
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Grado escolar --}}
                    <div>
                        <x-input-label for="grade" :value="__('welcome.School Grade')" />
                        <select name="grade" id="grade" wire:model="grade" class="rounded-md"> Grado escolar
                            @if ($level == 'Secundaria')
                                @for ($i = 1; $i <= 3; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            @else
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade }}">
                                        {{ $grade }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                {{-- Discapacidad --}}
                <div>
                    <x-input-label :value="__('welcome.Disability')" class="pb-3" />
                    <div class="flex flex-row gap-3">
                        <div class="flex flex-row gap-3">
                            <x-input-label for="disability" wire:model.boolean="disability" :value="__('welcome.Yes')" />
                            <input type="radio" name="disability" :value="__('welcome.Yes')" />
                        </div>
                        <div class="flex flex-row gap-3">
                            <x-input-label for="disability" wire:model="disability" :value="__('welcome.No')" />
                            <input type="radio" name="disability" :value="__('welcome.No')" selected />
                        </div>
                    </div>
                </div>

                {{-- Tipo de discapacidad --}}
                <div>
                    <x-input-label for="disability_type" :value="__('welcome.Disability type')" />
                    <x-text-input id="disability_type" wire:model="disability_type" class="block mt-1 w-full"
                        type="text" required autofocus />
                </div>

                {{-- Preparacion anterior --}}
                <div>
                    <x-input-label :value="__('welcome.Religious prep')" class="pb-3" />
                    <div class="flex flex-row gap-3">
                        <div class="flex flex-row gap-3">
                            <x-input-label for="religious-prep" :value="__('welcome.Yes')" />
                            <input type="radio" wire:model.boolean="religion_prep" name="religious-prep"
                                :value='false' />
                        </div>
                        <div class="flex flex-row gap-3">
                            <x-input-label for="religious-prep" :value="__('welcome.No')" />
                            <input type="radio" wire:model="religion_prep" name="religious-prep"
                                :value="true" selected />
                        </div>
                    </div>
                </div>

                {{-- Ultima preparacion --}}
                <div>
                    <x-input-label for="last-prep" :value="__('welcome.Last prep')" />
                    <x-text-input id="last-prep" wire:model="prev_catechisms_grade" class="block mt-1 w-full"
                        type="text" required />
                </div>

                <div>
                    <x-input-label for="obserbations" :value="__('welcome.Obserbations')" />
                    <x-text-input id="obserbations" wire:model="observations" class="block mt-1 w-full" type="text"
                        required />
                </div>

            </div>

            {{-- Padres y documentos --}}
            <div class="flex flex-col gap-3 flex-1">
                {{-- Padres --}}
                <div id="parents-info"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-6 flex flex-col gap-3">

                    <p class="text-xl font-bold text-gray-700 pb-2 text-center">Datos de los padres</p>

                    <!-- Nombre padre -->
                    <div>
                        <x-input-label for="name" :value="__('welcome.Father name')" />
                        <x-text-input wire:model="father_name" id="father_name" class="block mt-1 w-full" type="text"
                            name="father_name" required />
                    </div>

                    <!-- telefono padre -->
                    <div>
                        <x-input-label for="f_phone_number" :value="__('welcome.Father phone')" />
                        <x-text-input wire:model="f_phone_number" id="f_phone_number" class="block mt-1 w-full"
                            type="number" name="f_phone_number" required />
                    </div>

                    <!-- ocupacion padre -->
                    <div>
                        <x-input-label for="f_ocupation" :value="__('welcome.Father ocupation')" />
                        <x-text-input wire:model="f_ocupation" id="f_ocupation" class="block mt-1 w-full"
                            type="number" name="f_ocupation" required />
                    </div>

                    <!-- Nombre de la madre -->
                    <div>
                        <x-input-label for="mother_name" :value="__('welcome.Mother name')" />
                        <x-text-input wire:model="mother_name" id="mother_name" class="block mt-1 w-full"
                            type="text" name="mother_name" required />
                    </div>

                    <!-- telefono madre -->
                    <div>
                        <x-input-label for="m_phone_number" :value="__('welcome.Mother phone')" />
                        <x-text-input wire:model="m_phone_number" id="m_phone_number" class="block mt-1 w-full"
                            type="number" name="m_phone_number" required />
                    </div>

                    <!-- ocupacion madre -->
                    <div>
                        <x-input-label for="m_ocupation" :value="__('welcome.Mother ocupation')" />
                        <x-text-input wire:model="m_ocupation" id="m_ocupation" class="block mt-1 w-full"
                            type="text" name="m_ocupation" required />
                    </div>

                    <!-- Estatus de ralacion -->
                    <div>
                        <x-input-label for="relationship_status" :value="__('welcome.Relationship')" />
                        <x-text-input wire:model="relationship_status" id="relationship_status"
                            class="block mt-1 w-full" type="text" name="relationship_status" required />
                    </div>

                </div>

                <div id="documentation"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-6 flex flex-col gap-3">

                    <p class="text-xl font-bold text-gray-700 pb-2 text-center">Documentación</p>

                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="flex-1">

                            {{-- Nacimiento --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Birth')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="birth_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="birth_cert" :value="__('welcome.Yes')"
                                            wire:model="birth_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="birth_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="birth_cert" wire:model="birth_cert"
                                            :value="__('welcome.No')" />
                                    </div>
                                </div>
                            </div>

                            {{-- Bautizo --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Bautizim')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="bautizm_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="bautizm_cert" :value="__('welcome.Yes')"
                                            wire:model="bautizm_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="bautizm_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="bautizm_cert" :value="__('welcome.No')"
                                            wire:model="bautizm_cert" />
                                    </div>
                                </div>
                            </div>

                            {{-- Copia simple --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Simple')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="simple_bautizm_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="simple_bautizm_cert" :value="__('welcome.Yes')" 
                                        wire:model = "simple_bautizm_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="simple_bautizm_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="simple_bautizm_cert" :value="__('welcome.No')"
                                        wire:model = "simple_bautizm_cert" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex-1">

                            {{-- Curso previo --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Previous')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="prev_course_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="prev_course_cert" :value="__('welcome.Yes')" 
                                        wire:model = "prev_course_cert"/>
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="prev_course_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="prev_course_cert" :value="__('welcome.No')"
                                        wire:model = "prev_course_cert" />
                                    </div>
                                </div>
                            </div>

                            {{-- Confirmación --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Confirmation')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="confirmation_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="confirmation_cert" :value="__('welcome.Yes')" 
                                        wire:model="confirmation_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="confirmation_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="confirmation_cert" :value="__('welcome.No')"
                                        wire:model="confirmation_cert" />
                                    </div>
                                </div>
                            </div>

                            {{-- Comunion --}}
                            <div>
                                <x-input-label :value="__('welcome.Cert.Communion')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="communion_cert" :value="__('welcome.Yes')" />
                                        <input type="radio" name="communion_cert" :value="__('welcome.Yes')" 
                                        wire:model="communion_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="communion_cert" :value="__('welcome.No')" />
                                        <input type="radio" name="communion_cert" :value="__('welcome.No')" 
                                        wire:model="communion_cert" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div class="flex items-center justify-center">
            <x-primary-button class="ms-4">
                {{ __('welcome.Add student') }}
            </x-primary-button>
        </div>
    </form>


</div>
