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
    	return view('watch-series', compact('series', 'lesson'));
    }
}
