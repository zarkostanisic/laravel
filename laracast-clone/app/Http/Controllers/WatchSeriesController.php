<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Lesson;

class WatchSeriesController extends Controller
{
    public function index(Series $series){
    	return redirect()->route('series.watch', [
    		'series' => $series->slug,
    		'lesson' => $series->lessons->first()->id
    	]);
    }

    public function watch(Series $series, Lesson $lesson){
    	$next_lesson = $lesson->nextLesson();
    	$prev_lesson = $lesson->prevLesson();

    	return view('watch-series', compact('series', 'lesson', 'next_lesson', 'prev_lesson'));
    }

    public function complete(Lesson $lesson) {
        auth()->user()->completeLesson($lesson);

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
