<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    /* Students */
    public string $first_name = '';
    public string $father_surname = '';
    public string $mother_surname = '';
    public string $birthday = '';
    public bool $disability = false;
    public string $disability_type = '';
    public bool $religion_prep = false;
    public array $preparation_list = ['Bautizo', 'Preconfirmación', 'Confirmación', 'Precomunion', 'Comunion'];
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

};
?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="flex flex-col gap-2  sm:px-4 py-5">
        @csrf

        <div class="flex flex-col md:flex-col lg:flex-row gap-2 px-4 py-5">
            {{-- Niños --}}
            <div id="student-info"
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 flex flex-col md:flex-1 gap-3 flex-1">

                <p class="text-xl font-bold text-gray-700 pb-2 text-center">Datos del alumno</p>
                <!-- Name -->
                <div>
                    <x-input-label for="first_name" :value="__('welcome.Student name')" />
                    <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text"
                        name="first_name" required />
                </div>

                {{-- Apellido paterno --}}
                <div>
                    <x-input-label for="father_surname" :value="__('welcome.Father Surname')" />
                    <x-text-input id="father_surname" class="block mt-1 w-full" type="text" name="father_surname"
                        wire:model="father_surname" required />
                </div>

                {{-- Apellido materno --}}
                <div>
                    <x-input-label for="mother_surname" :value="__('welcome.Mother Surname')" />
                    <x-text-input id="mother_surname" class="block mt-1 w-full" type="text" name="mother_surname"
                        wire:mode="mother_surname" required />
                </div>

                {{-- Cumpleaños --}}
                <div>
                    <x-input-label for="birthday" :value="__('welcome.Birthday')" />
                    <x-text-input id="birthday" class="block mt-1 w-full" type="text" name="birthday"
                        wire:model="birthday" required />
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
                            <x-input-label for="disability" :value="__('welcome.Yes')" />
                            <input type="radio" value="1" wire:model.change="disability" />
                        </div>
                        <div class="flex flex-row gap-3">
                            <x-input-label for="disability" :value="__('welcome.No')" />
                            <input type="radio" value="0" wire:model.change="disability" />
                        </div>
                    </div>
                </div>
                
                @if ($disability)
                    {{-- Tipo de discapacidad --}}
                    <div>
                        <x-input-label for="disability_type" :value="__('welcome.Disability type')" />
                        <x-text-input id="disability_type" wire:model="disability_type" class="block mt-1 w-full"
                            type="text" required autofocus />
                    </div>
                @endif


                {{-- Preparacion anterior --}}
                <div>
                    <x-input-label :value="__('welcome.Religious prep')" class="pb-3" />
                    <div class="flex flex-row gap-3">
                        <div class="flex flex-row gap-3">
                            <x-input-label for="religious-prep" :value="__('Welcome.Yes')" />
                            <input type="radio" wire:model.change="religion_prep" 
                                value='1' />
                        </div>
                        <div class="flex flex-row gap-3">
                            <x-input-label for="religious-prep" :value="__('Welcome.No')" />
                            <input type="radio" wire:model.change="religion_prep" 
                                value="0" />
                        </div>
                    </div>
                </div>

                @if ($religion_prep)
                    {{-- Ultima preparacion --}}
                    <select  id="level" wire:model="prev_catechisms_grade" class="rounded-md"> Ultima preparación
                        @foreach ($preparation_list as $prep)
                            <option value="{{ $prep }}">
                                {{ $prep }}
                            </option>
                        @endforeach
                    </select>
                    
                @endif

                <div>
                    <x-input-label for="observations" :value="__('welcome.Obserbations')" />
                    <x-text-input id="observations" name="observations" wire:model="observations" class="block mt-1 w-full" type="text"
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
                            type="text" name="f_phone_number" required />
                    </div>

                    <!-- ocupacion padre -->
                    <div>
                        <x-input-label for="f_ocupation" :value="__('welcome.Father ocupation')" />
                        <x-text-input wire:model="f_ocupation" id="f_ocupation" class="block mt-1 w-full"
                            type="text" name="f_ocupation" required />
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
                            type="text" name="m_phone_number" required />
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

                <div id="documentation" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-6 flex flex-col gap-3">
                    <p class="text-xl font-bold text-gray-700 pb-2 text-center">Documentación</p>
                
                    <div class="flex flex-col md:flex-row lg:flex-row">
                        <div class="flex-1">
                            <!-- Birth Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Birth')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="birth_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="birth_cert" id="birth_cert_yes" value="1" wire:model="birth_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="birth_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="birth_cert" id="birth_cert_no" value="0" wire:model="birth_cert" />
                                    </div>
                                </div>
                            </div>
                
                            <!-- Baptism Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Bautizm')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="bautizm_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="bautizm_cert" id="bautizm_cert_yes" value="1" wire:model="bautizm_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="bautizm_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="bautizm_cert" id="bautizm_cert_no" value="0" wire:model="bautizm_cert" />
                                    </div>
                                </div>
                            </div>
                
                            <!-- Simple Baptism Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Simple')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="simple_bautizm_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="simple_bautizm_cert" id="simple_bautizm_cert_yes" value="1" wire:model="simple_bautizm_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="simple_bautizm_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="simple_bautizm_cert" id="simple_bautizm_cert_no" value="0" wire:model="simple_bautizm_cert" />
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="flex-1">
                            <!-- Previous Course Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Previous')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="prev_course_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="prev_course_cert" id="prev_course_cert_yes" value="1" wire:model="prev_course_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="prev_course_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="prev_course_cert" id="prev_course_cert_no" value="0" wire:model="prev_course_cert" />
                                    </div>
                                </div>
                            </div>
                
                            <!-- Confirmation Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Confirmation')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="confirmation_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="confirmation_cert" id="confirmation_cert_yes" value="1" wire:model="confirmation_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="confirmation_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="confirmation_cert" id="confirmation_cert_no" value="0" wire:model="confirmation_cert" />
                                    </div>
                                </div>
                            </div>
                
                            <!-- Communion Certificate -->
                            <div>
                                <x-input-label :value="__('welcome.Cert.Communion')" class="pb-3" />
                                <div class="flex flex-row gap-3">
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="communion_cert_yes" :value="__('welcome.Yes')" />
                                        <input type="radio" name="communion_cert" id="communion_cert_yes" value="1" wire:model="communion_cert" />
                                    </div>
                                    <div class="flex flex-row gap-3">
                                        <x-input-label for="communion_cert_no" :value="__('welcome.No')" />
                                        <input type="radio" name="communion_cert" id="communion_cert_no" value="0" wire:model="communion_cert" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>

        <div class="flex items-center justify-center">
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
            <x-primary-button class="ms-4">
                {{ __('welcome.Add student') }}
            </x-primary-button>
        </div>
    </form>


</div>
