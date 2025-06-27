<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherId = auth()->id();

        $publishedCourses = Course::where('teacher_id', $teacherId)
            ->where('status', 'publish')
            ->get();

        $pendingCourses = Course::where('teacher_id', $teacherId)
            ->where('status', 'pending')
            ->get();

        $draftCourses = Course::where('teacher_id', $teacherId)
            ->where('status', 'draft')
            ->get();

        return view('users.course.index-course', [
            'publishedCourses' => $publishedCourses,
            'pendingCourses'   => $pendingCourses,
            'draftCourses'     => $draftCourses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.course.create-course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'in:draft,pending,publish'],
            'course_code' => ['required', 'string', 'max:255', 'unique:courses,course_code'],
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('courses', 'public_uploads');
        }

        $validated['teacher_id'] = auth()->id();

        Course::query()->create($validated);

        return redirect()
            ->route('course.index')
            ->with('success', 'Курс успешно создан');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
