<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parents;

class Students extends Model
{
    /** @use HasFactory<\Database\Factories\StudenFactory> */
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'first_name',
        'father_surname',
        'mother_surname',
        'birthday',
        'scholar_level',
        'scholar_grade',
        'grade',
        'disability',
        'disability_type',
        'religion_prep',
        'prev_catechisms_grade',
        'observations',
        'birth_cert',
        'bautizm_cert',
        'simple_bautizm_cert',
        'prev_course_cert',
        'confirmation_cert',
        'communion_cert'
    ];

    public function parents() {
        return $this->belongsTo(Parents::class);
    }

    public function store() {
        /* dd(request()->all()); */

        Students::create([
            'first_name' => request('first_name'),
            'father_surname' => request('father_surname'),
            'mother_surname' => request('mother_surname'),
            'birthday' => request('birthday'),
            'scholar_level' => request('level'),
            'scholar_grade' => request('grade'),
            'disability' => request('disability'),
            'disability_type' => request('disability_type'),
            'religion_prep' => request('religious-prep'),
            'prev_catechisms_grade' => request('prev_catechisms_grade'),
            'observations' => request('observations'),
            'birth_cert' => request('birth_cert'),
            'bautizm_cert' => request('bautizm_cert'),
            'simple_bautizm_cert' => request('simple_bautizm_cert'),
            'prev_course_cert' => request('prev_course_cert'),
            'confirmation_cert' => request('confirmation_cert'),
            'communion_cert' => request('communion_cert')
        ]);

        Parents::create([
            'father_name' => request('father_name'),
            'f_phone_number' => request('f_phone_number'),
            'f_ocupation' => request('f_ocupation'),
            'mother_name' => request('mother_name'),
            'm_phone_number' => request('m_phone_number'),
            'm_ocupation' => request('m_ocupation'),
            'relationship_status' => request('relationship_status'),
        ]);
        
        return redirect()->back()->with('success', 'Estudiante agregado');
    }
}
