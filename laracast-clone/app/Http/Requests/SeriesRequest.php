<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function uploadSeriesImage(){
        $image = $this->image;

        $this->image_new_name = str_slug($this->title) . '.' . $image->getClientOriginalExtension();

        $image->storePubliclyAs('series', $this->image_new_name);

        return $this;
    }
}
