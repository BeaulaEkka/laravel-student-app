<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupsResource;
use App\Http\Resources\StudentResource;
use App\Models\Group;
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

    public function create()
    {
        $group = GroupsResource::collection(Group::all());
        return inertia('Students/Create', [
            'group' => $group,
        ]);
    }
}
