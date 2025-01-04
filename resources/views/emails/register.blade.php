@component('mail::message')

<p style="text-transform: capitalize;">Dear <b>{{ $user->name }}</b>,</p>

<p>We're excited to welcome you to Nethmira Apparel!</p>

<p>To get started and begin enjoying our products, please verify your email address by clicking the button below:</p>

<p>
    @component('mail::button', ['url' => url('activate/'.base64_encode($user->id))])
    Verify
    @endcomponent
</p>

<p>Verifying your email address will ensure you have full access to our website and can begin shopping.</p>

<p>Thank you for choosing Nethmira Apparel. We look forward to serving you!</p>

Best regards,
{{ config('app.name') }} Team.

@endcomponent