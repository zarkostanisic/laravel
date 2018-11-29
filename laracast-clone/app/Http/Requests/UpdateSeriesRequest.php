<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeriesRequest extends SeriesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image' => 'image',
            'description' => 'required'
        ];
    }

    public function updateSeries($series){
        if($this->hasFile('image')){
            $series->image = 'series/' . $this->uploadSeriesImage()->image_new_name;
        }

        $series->title = $this->title;
        $series->slug = str_slug($this->title);
        $series->description = $this->description;
        $series->save();
    }
}
