<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($courseId)
    {
        $sections = Section::where('course_id', $courseId)->get();
        return view('users.video.create-lesson-video',[
            'sections' => $sections,
            'courseId' => $courseId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'section_id' => ['required', 'exists:sections,id'],
        ]);

        Video::query()->create($validated);

        $section = Section::findOrFail($validated['section_id']);

        return redirect()
            ->route('course.details-course', $section->course_id)
            ->with('success', 'Видеоурок успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = Video::query()->findOrFail($id);

        // Преобразование YouTube URL в embed формат
        $embedUrl = $this->convertToEmbedUrl($video->url);

        return view('users.video.show-lesson-video', [
            'video' => $video,
            'embedUrl' => $embedUrl,
        ]);
    }

    private function convertToEmbedUrl($url)
    {
        // Если это обычная ссылка YouTube
        if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Если это ссылка с параметром v
        if (preg_match('/v=([^&]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // Если это уже embed ссылка
        if (str_contains($url, 'youtube.com/embed')) {
            return $url;
        }

        return $url; // если не удалось распознать, вернуть как есть
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $video = Video::findOrFail($id);

        // получаем все разделы того курса, к которому принадлежит видео через его section
        $sections = Section::where('course_id', $video->section->course_id)->get();

        return view('users.video.edit-lesson-video', [
            'video' => $video,
            'sections' => $sections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'section_id' => ['required', 'exists:sections,id'],
        ]);

        $video = Video::findOrFail($id);

        $video->update($validated);

        // получаем id курса, чтобы сделать редирект
        $section = Section::findOrFail($validated['section_id']);

        return redirect()
            ->route('course.details-course', $section->course_id)
            ->with('success', 'Видеоурок успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);

        // запоминаем id курса через раздел
        $courseId = $video->section->course_id;

        $video->delete();

        return redirect()
            ->route('course.details-course', $courseId)
            ->with('success', 'Видеоурок успешно удалён');
    }
}
