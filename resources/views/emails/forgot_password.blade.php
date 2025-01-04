@component('mail::message')

<p style="text-transform: capitalize;">Dear <b>{{ $user->name }}</b>,</p>

<p>We received a request to reset your password for your account on {{ config('app.name') }}.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>After reset password please login back.</p>

<p>In case you have any issues recovering your password, please contact us.</p>

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent