<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>
<body>
<div class="mx-auto">
    <div class="container flex p-6 flex-col flex-wrap p-5 mx-auto md:items-center md:flex-row">
        <a href="{{ route('welcome') }}">
            <h1 class="text-2xl font-lg cursor-pointer font-bold">
                {{ config('app.name') }}
            </h1>
        </a>
        <nav class="flex flex-wrap items-center justify-center text-base lg:mr-auto"></nav>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="text-medium font-bold text-gray-900">{{ __('Dashboard') }}</a>
            @else
                <a href="{{ route('login') }}" class="text-medium font-bold text-gray-900">{{ __('Log in') }}</a>
            @endauth
        @endif
    </div>


    <section class="text-blueGray-700 bg-indigo-50">
        <div class="container flex flex-col items-center py-16 mx-auto md:flex-row lg:px-28">
            <div class="flex flex-col items-start mb-16 text-left lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:mb-0">
                <h1 class="mb-8 text-2xl font-black text-black md:text-5xl">{{ __('Complete ISP management') }}</h1>
                <p class="mb-8 text-base leading-relaxed text-left text-blueGray-600 ">
                    {{ __('Betternet is a complete, feature-rich ISP management solution. Powered by Mikrotik api, it automates many business tasks and takes care of user billing and payment') }}
                </p>
                <div class="flex flex-col justify-center lg:flex-row">
                    <a href="https://codecanyon.net/item/better-net-isp-billing-with-mikrotik-ticketing/22189099?s_rank=1" class="flex items-center px-6 py-2 mt-auto mr-3 font-semibold text-indigo-50 bg-indigo-400 rounded-lg ring-offset-current ring-offset-2">{{ __('Purchase') }}</a>
                    <a href="{{ route('login') }}" class="flex items-center px-6 py-2 mt-auto font-semibold text-indigo-800 bg-indigo-200 rounded-lg ring-offset-current ring-offset-2">{{ __('Demo') }}</a>
                </div>
            </div>
            <div class="w-full lg:w-5/6 lg:max-w-lg md:w-1/2">
                <img class="object-cover object-center rounded-lg " alt="hero" src="{{ asset('images/cover.png') }}">
            </div>
        </div>
    </section>


    <section class="text-blueGray-700 ">
        <div class="container flex flex-col items-center mt-10 px-5 py-8 mx-auto">
            <div class="flex flex-col w-full text-left lg:text-center">
                <h2 class="mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font">{{ __('New features') }}</h2>
                <h1 class="mx-auto mb-12 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 sm:text-6xl title-font">
                    {{ __('Everything you need') }}
                </h1>
            </div>
        </div>
    </section>


    <section class="text-blueGray-700">
        <div class="container items-center px-5 py-8 mx-auto lg:px-10">
            <div class="flex flex-wrap text-left">
                 <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-microchip mb-2"></i><br>{{ __('Mikrotik API') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-dollar-sign mb-2"></i><br>{{ __('Stripe payment') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-mail-bulk mb-2"></i><br>{{ __('Email notification') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-clock mb-2"></i><br>{{ __('Service auto expires') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-user-tie mb-2"></i><br>{{ __('Reseller module') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-user-ninja mb-2"></i><br>{{ __('Role based access') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-home mb-2"></i><br>{{ __('Home page') }}</h1>
                    </div>
                </div>
                <div class="w-full mx-auto lg:w-1/2">
                    <div class="p-6">

                        <h1 class="mx-auto mb-2 text-black text-3xl font-bold text-center"><i class="fa fa-2x fa-file-invoice-dollar mb-2"></i><br>{{ __('Invoice') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-10 bg-indigo-50">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <section class="text-blueGray-700 ">
                <div class="container flex flex-col items-center py-8 mx-auto">
                    <div class="flex flex-col w-full mb-12 text-left lg:text-center">
                        <h1 class="mx-auto text-2xl font-bold uppercase">{{ __('Other features') }}</h1>
                    </div>
                </div>
            </section>

            <section class="container px-6 mx-auto">
                <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Package management') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('User management') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Reseller management') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Staff management') }}</p>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Ticketing') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Income and expense') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Mikrotik log') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('20 Mikrotik commands') }}</p>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Service zone') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Customer manager') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Package expiry') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('PPP/HotSpot users') }}</p>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('User profile') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Active PPP/HotSpot users') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('RouterOS support') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Reseller user management') }}</p>
                    </div>

                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Build with Laravel') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Tailwind CSS') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('New UI') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Local currency') }}</p>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-md">
                        <p class="ml-4 font-bold text-xl">{{ __('Time zone') }}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="items-center bg-white">
        <footer class="border">
            <div class="flex flex-col flex-wrap justify-center p-5 md:flex-row">
                <nav class="flex flex-wrap items-center justify-center w-full mx-auto mb-6 text-base nprd">
                    <a href="https://codecanyon.net/item/better-net-isp-billing-with-mikrotik-ticketing/22189099?s_rank=1" class="px-4 py-1 mr-1 text-base">{{ __('Purchase') }}</a>
                    <a href="{{ route('login') }}" class="px-4 py-1 mr-1 text-base">{{ __('Demo') }}</a>
                    <a href="mailto:#" class="px-4 py-1 mr-1 text-base">{{ __('Contact') }}</a>
                </nav>
            </div>

            <div class="flex flex-col flex-wrap justify-center p-5 md:flex-row">
                <nav class="flex flex-wrap items-center justify-center w-full mx-auto mb-6 text-base nprd">
                    {{ __('© 2021 ' . config('app.name')) }}
                </nav>
            </div>
        </footer>
    </div>

</div>
</body>
</html>
