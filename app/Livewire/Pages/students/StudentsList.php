<?php

namespace App\Livewire\Pages\students;
use Livewire\Component;
use App\Models\Students;
use Livewire\WithPagination;

class StudentsList extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Students::paginate(10);

        return view('livewire.pages.students.students-list', [
            'students' => $students,
        ])->layout('layouts.app');
    }
}
