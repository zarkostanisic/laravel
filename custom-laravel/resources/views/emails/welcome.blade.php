@component('mail::message')
# Welcome to our sass app, {{ $user->name }}

You can visit our page.

@component('mail::button', ['url' => route('home') ])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
