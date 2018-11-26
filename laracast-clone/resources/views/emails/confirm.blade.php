@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => route('register.confirm') . "?token={$user->confirm_token}" ])
Confirm email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
