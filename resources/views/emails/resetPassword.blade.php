@component('mail::message')
# Introduction
your code is {{ $code }}.

@component('mail::button', ['url' => 'http://localhost:8000/admin/resetPassword?code={{ $code }}'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
