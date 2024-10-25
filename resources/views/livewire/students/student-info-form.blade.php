<?php 

use Livewire\Volt\Component;

new class extends Component {

    public array $levels = ['Primaria', 'Secundaria', 'Preparatoria'];
    public array $grades = [1,2,3,4,5,6];

}

?>

<div class="sm:px-8 md:px-44 sm:py-3 md:py-5">

    <div id="student-info" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-6 md:flex-1">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('welcome.Student name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Apellido paterno --}}
        <div>
            <x-input-label for="father_surname" :value="__('welcome.Father Surname')" />
            <x-text-input id="father_surname" class="block mt-1 w-full" type="text" name="father_surname" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Apellido materno --}}
        <div>
            <x-input-label for="mother_surname" :value="__('welcome.Mother Surname')" />
            <x-text-input id="mother_surname" class="block mt-1 w-full" type="text" name="mother_surname" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Cumpleaños --}}
        <div>
            <x-input-label for="birthday" :value="__('welcome.Birthday')" />
            <x-text-input id="birthday" class="block mt-1 w-full" type="text" birthday="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Grado escolar --}}
        <div class="flex gap-3">
            <div>
                <x-input-label for="level" :value="__('welcome.School level')"/>
                <select name="grade" id="" class="rounded-md"> Grado escolar
                    @foreach ($levels as $level)
                        <option value="{{ $level }}">
                            {{ $level }}                
                        </option>
                    @endforeach 
                </select>
            </div>
            <div>
                <x-input-label for="grade" :value="__('welcome.School Grade')" />
                <select name="grade" id="" class="rounded-md"> Grado escolar
                    @foreach ($grades as $grade)
                        <option value="{{ $grade }}">
                            {{ $grade }}                
                        </option>
                    @endforeach 
                </select>
            </div>
        </div>

        {{-- Discapacidad --}}
        <div>
            <x-input-label :value="__('welcome.Disability')" class="pb-3"/>
            <div class="flex flex-row gap-3">
                <div class="flex flex-row gap-3">
                    <x-input-label for="disability" :value="__('welcome.Yes')" />
                    <input type="radio" name="disability" :value="__('welcome.Yes')"/>
                </div>
                <div class="flex flex-row gap-3">
                    <x-input-label for="disability" :value="__('welcome.No')" />
                    <input type="radio" name="disability" :value="__('welcome.No')" selected/>
                </div>
            </div>
        </div>

        {{-- Tipo de discapacidad --}}
        <div>
            <x-input-label for="disability" :value="__('welcome.Disability type')" />
            <x-text-input id="disability" class="block mt-1 w-full" type="text" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Preparacion anterior --}}
        <div>
            <x-input-label :value="__('welcome.Religious prep')" class="pb-3"/>
            <div class="flex flex-row gap-3">
                <div class="flex flex-row gap-3">
                    <x-input-label for="religious-prep" :value="__('welcome.Yes')" />
                    <input type="radio" name="religious-prep" :value="__('welcome.Yes')"/>
                </div>
                <div class="flex flex-row gap-3">
                    <x-input-label for="religious-prep" :value="__('welcome.No')" />
                    <input type="radio" name="religious-prep" :value="__('welcome.No')" selected/>
                </div>
            </div>
        </div>

        {{-- Ultima preparacion --}}
        <div>
            <x-input-label for="last-prep" :value="__('welcome.Last prep')" />
            <x-text-input id="last-prep" class="block mt-1 w-full" type="text" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="obserbations" :value="__('welcome.Obserbations')" />
            <x-text-input id="obserbations" class="block mt-1 w-full" type="text" autofocus />
        </div>

    </div>

</div>