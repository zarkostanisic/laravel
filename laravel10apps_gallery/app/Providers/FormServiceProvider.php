<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes']);
        Form::component('bsSelect', 'components.form.select', ['name', 'value', 'attributes']);
        Form::component('bsSubmit', 'components.form.submit', ['value', 'attributes']);
        Form::component('bsHidden', 'components.form.hidden', ['name', 'value', 'attributes']);
        Form::component('bsFile', 'components.form.file', ['name', 'value', 'attributes']);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'value', 'attributes']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
