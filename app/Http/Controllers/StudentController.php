<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        Gate::authorize('viewAny', Student::class);
        return Student::all();
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Student::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        Gate::authorize('view', $student);
        return $student;
    }

    public function update(Request $request, Student $student)
    {
        Gate::authorize('update', $student);

        $student->update($request->all());
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        Gate::authorize('delete', $student);

        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }
}