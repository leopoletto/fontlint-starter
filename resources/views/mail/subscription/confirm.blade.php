{{-- resources/views/mail/subscription/confirm.blade.php --}}
@component('mail::message')
# Confirm your email

Thanks for joining **Font Lint** — a web font generator and open dataset that helps you optimize & self-host fonts the right way.

You’ll receive **one short update per week** with progress, live demos, and release dates.

@component('mail::button', ['url' => $verifyUrl])
Confirm my email
@endcomponent

If the button doesn’t work, copy and paste this link:
{{ $verifyUrl }}

No spam — just practical insights and tools to make your websites faster, lighter, and license-safe.

Cheers,
Leonardo Poletto — Font Lint
@endcomponent
