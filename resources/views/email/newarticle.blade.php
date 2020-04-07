@component('mail::message')
Hello friend RikkeiSolf News han a New Article for you !!!

Click Here for Watch New Article

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Watch New Article
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
