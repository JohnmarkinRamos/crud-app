<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $subjects = [
            'IT-53',
            'IT-55',
            'IT-54',
            'CWTS',
            'History',
            'Computer Studies',
        ];

        $subjectModels = collect($subjects)->mapWithKeys(function (string $subjectName) {
            $subject = Subject::firstOrCreate(['subject_name' => $subjectName]);

            return [$subjectName => $subject->id_subjectname];



            
        });

        $johnmarkin = Student::where('first_name', 'Johnmarkin')
            ->where('last_name', 'ramos')
            ->orderBy('id')
            ->first();

        if ($johnmarkin) {
            $johnmarkin->subjects()->sync([
                $subjectModels['CWTS'],
                $subjectModels['IT-55'],
                $subjectModels['IT-54'],
            ]);
        }
    }
}
