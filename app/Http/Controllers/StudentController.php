<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentResource::collection(Student::paginate(10));

        return inertia('Students/Index', [
            'students' => $students,
        ]);

    }
}