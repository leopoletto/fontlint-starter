@extends('layouts.app')

@section('content')
    @php($pending = session('subscribed_pending'))
    @php($verified = session('subscribed_verified'))
    <section class="relative min-h-screen hero grid py-3 sm:py-10  justify-center border-b border-b-stone-400">
        <div class="mx-auto max-w-4xl px-2 sm:px-6 justify-start text-center flex flex-col gap-5">
            <header>
                <nav
                    class="mx-auto flex w-full max-w-3xl items-center justify-evenly"
                    aria-label="Global"
                >
                    <div class="mx-auto flex self-center pt-5 sm:pt-10">
                        <x-brand.logo class="h-18 text-primary-900"/>
                    </div>
                </nav>
            </header>

            <h1 class="text-4xl sm:text-[64px] mt-3 sm:mt-10 font-headline leading-tight tracking-tight">
                <span class="text-primary-700 px-1">Optimize & Self-Host Your Web Fonts, </span>
                <em class="text-primary-800 px-1 pb-1 italic font-normal">the Right Way</em>
            </h1>
            @if(!$verified && !$pending)
            <p class="px-2 md:px-0 text-xl max-w-4xl mx-auto font-normal text-stone-600 mt-5 mb-5 leading-relaxed">
                Generate lighter font files with <em class="underline underline-offset-2">custom fallbacks</em>,
                <em class="underline underline-offset-2">unicode-aware subsets</em>, and <em class="underline underline-offset-2">license-safe metadata.</em>
                Get instant analysis and recommendations to cut payloads by up to 70%.
            </p>
            @endif

            @if($verified)
                <div class="rounded-xl mt-10 border border-emerald-300 p-4 bg-emerald-50 text-emerald-100">
                    <p class="font-headline text-2xl">You're in! 🎉</p>
                    <p class="mt-3 text-lg">You’ll get weekly updates on the course progress and new lessons.</p>
                    <p class="mt-1 text-lg">
                        Follow along:
                        <a class="underline underline-offset-2" href="https://x.com/leopoletto" rel="me nofollow">X</a> ·
                        <a class="underline underline-offset-2" href="https://www.linkedin.com/in/leoopoletto" rel="me nofollow">LinkedIn</a>
                    </p>
                </div>
            @elseif($pending)
                <div class="rounded-xl  mt-10 border p-4 border-orange-web-300 bg-orange-web-900/50 text-orange-web-100">
                    <p class="font-headline text-2xl">Please confirm your email 📨</p>
                    <p class="mt-3 text-lg">We’ve sent a confirmation link. Click it to join early access.</p>
                    <p class="mt-1">Didn’t get it? Check spam, or request again below.</p>
                </div>
            @endif

            @if(!$verified)
                <div class="w-full block">
                    <form class="mt-4 px-2 sm:px-0 group max-w-xl mx-auto flex flex-col sm:flex-row gap-3 justify-between"
                          action="{{ route('subscriber.register') }}" method="post">
                        @csrf
                        <input name="email" type="email" required
                               class="w-full py-3 sm:py-2  bg-white  rounded-xl invalid:ring-2 valid:ring-1 invalid:ring-stone-700/50 valid:ring-emerald-200/50 px-4 text-stone-900 placeholder-stone-400"
                               placeholder="your@email.com"
                               autocomplete="email">
                        <button type="submit"
                                class="rounded-xl w-full min-w-fit mt-2 sm:mt-0 sm:w-auto bg-primary-700 px-5 py-4 font-normal text-white  transition-all border-b-4 border-b-smoky-black hover:border-b-6 active:border-b-4 shadow-sm  focus:outline-none focus:ring-2 focus:ring-primary-500">
                            {{$pending ? 'Request Again' : 'Get early access'}}
                        </button>
                    </form>
                </div>
                @error('email')
                <p class="mt-1 text-base text-red-700">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-base text-stone-700">Be the first to test new font optimization tools and datasets.</p>
            @endif

        </div>
    </section>
@endsection
