<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\Lesson;

class WatchSeriesController extends Controller
{
    public function index(Series $series){
        $user = auth()->user();

        if($user->hasStartedSeries($series)){
            $lesson = $user->getNextLessonToBeWatch($series);
        }else{
            $lesson = $series->lessons->first()->id;
        }

    	return redirect()->route('series.watch', [
    		'series' => $series->slug,
    		'lesson' => $lesson
    	]);
    }

    public function watch(Series $series, Lesson $lesson){
        if(
            !auth()->user()->subscribed('yearly') &&
            !auth()->user()->subscribed('monthly')

        ){
            return redirect('/subscribe');
        }
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
