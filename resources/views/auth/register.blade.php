@extends('layouts.app')

@section('content')

    <div class="section register-section">
        <div class="container">
            <div class="columns">
                <div class="column title-column">
                    {{-- This is a prime place to make
                         a component, if you're going to
                         be reusing this sort of text styling--}}
                    <h1 class="title is-size-3-mobile is-size-1-tablet">Create an Account!</h1>
                    <p>Come join us on the corky side of life! And bring
                    your friends too! The Corkboard is always more fun with
                    a team, and cork is the best gift to share with those you
                    love (or even just those who you work with).</p>

                    <h3 class="title is-size-3-tablet is-hidden-mobile is-hidden-tablet-only">Already have an account?</h3>
                    <div class="align-button-container">
                        <a href="{{ route('login') }}" class="button is-large is-hidden-mobile is-hidden-tablet-only">Login</a>
                    </div>
                </div>

                <div class="column">
                    <register-card
                        errors="{{ (empty($errors)) ? new stdClass() : $errors }}"
                        submit-route="{{ route('register') }}"
                        old-values="{{ json_encode(['name' => old('name'), 'email' => old('email')]) }}"
                    ></register-card>
                </div>

                <div class="column title-column is-hidden-desktop">
                    <h3 class="title is-size-5-mobile mobile-to-login">Already have an account?</h3>
                    <div class="align-button-container">
                        <a href="{{ route('login') }}" class="button is-large">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
