@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="container mt-5">
        <div class="d-flex flex-column">
            <x-guest-layout>
                    <div class="container mt-5">
                        <div class="d-flex flex-column" id="post_view">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')"/>

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                        <div>
                                            <x-label for="email" :value="__('Email')"/>

                                            <x-input id="email" class="form-control" type="email" name="email"
                                                     :value="old('email')"
                                                     required autofocus/>
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')"/>

                                            <x-input id="password" class="form-control"
                                                     type="password"
                                                     name="password"
                                                     required autocomplete="current-password"/>
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                       name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                   href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif

                                            <x-button class="btn btn-primary">
                                                {{ __('Log in') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </x-guest-layout>
        </div>
    </div>

@endsection
