@component('mail::message')
<h2>{{$details['title']}}</h2>
<h2>{{$details['body']}}</h2>
@component('mail::button', ['url' => ''])
Complete Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
