<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Estudiantes registrados</h1>
    
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-50">
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">ID</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Name') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Father Surname') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Mother Surname') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Birthday') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.School level') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.School Grade') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Disability') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Disability type') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Religious prep') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Last prep') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" rowspan="2">{{ __('welcome.Obserbations') }}</th>
                    <th class="py-1 px-4 border text-sm font-semibold" colspan=6>Certificaciones</th>
                </tr>
                <!-- Second header row for individual certifications -->
                <tr class="bg-gray-50">
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Birth') }}</th>
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Bautizim') }}</th>
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Simple') }}</th>
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Previous') }}</th>
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Confirmation') }}</th>
                    <th class="py-1 px-4 border text-xs font-semibold">{{ __('welcome.Cert.Communion') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="text-center">
                        <td class="py-2 px-4 border text-sm">{{ $student->id }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->first_name }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->father_surname }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->mother_surname }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->birthday }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->scholar_level }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->scholar_grade }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->disability ? '✔' : '✘' }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->disability_type }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->religion_prep ? '✔' : '✘' }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->prev_catechisms_grade }}</td>
                        <td class="py-2 px-4 border text-sm">{{ $student->observations }}</td>
                         <!-- Certifications Data -->
                         <td class="py-2 px-4 border text-sm">{{ !$student->birth_cert ? '✔' : '✘' }}</td>
                         <td class="py-2 px-4 border text-sm">{{ !$student->bautizm_cert ? '✔' : '✘' }}</td>
                         <td class="py-2 px-4 border text-sm">{{ !$student->simple_bautizm_cert ? '✔' : '✘' }}</td>
                         <td class="py-2 px-4 border text-sm">{{ !$student->prev_course_cert ? '✔' : '✘' }}</td>
                         <td class="py-2 px-4 border text-sm">{{ !$student->confirmation_cert ? '✔' : '✘' }}</td>
                         <td class="py-2 px-4 border text-sm">{{ !$student->communion_cert ? '✔' : '✘' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Controls -->
        <div class="py-4">
            {{ $students->links() }}
        </div>
    </div>
</div>
