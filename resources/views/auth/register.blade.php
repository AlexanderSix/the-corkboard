@extends('layouts.app')

@section('content')

    <div class="section register-section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <register-card
                        errors="{{ (empty($errors)) ? new stdClass() : $errors }}"
                        submit-route="{{ route('register') }}"
                        old-values="{{ json_encode(['name' => old('name'), 'email' => old('email')]) }}"
                    ></register-card>
                </div>

                <div class="column">
                    <div class="card register-card">
                        <div class="card-header">
                            <header class="card-header-title">
                                <p>{{ __('Register') }}</p>
                            </header>
                        </div>

                        <div class="card-content">
                            {{--<form action="{{ route('register') }}" method="POST">--}}
                                {{--<div class="field">--}}
                                    {{--<label for="name" class="label">{{ __('Name') }}</label>--}}
                                    {{--<div class="control">--}}
                                        {{--<input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>--}}

                                        {{--@if ($errors->has('name'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field">--}}
                                    {{--<label for="email" class="label">{{ __('E-Mail Address') }}</label>--}}
                                    {{--<div class="control">--}}
                                        {{--<input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required>--}}

                                        {{--@if ($errors->has('email'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field">--}}
                                    {{--<label for="password" class="label">{{ __('Password') }}</label>--}}
                                    {{--<div class="control">--}}
                                        {{--<input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="Password" name="password" required>--}}

                                        {{--@if ($errors->has('password'))--}}
                                            {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                            {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field">--}}
                                    {{--<label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>--}}
                                    {{--<div class="control">--}}
                                        {{--<input id="password-confirm" type="password" class="input{{ $errors->has('password-confirm') ? ' is-danger' : '' }}" placeholder="Confirm Password" name="password-confirm" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="field">--}}
                                    {{--<div class="control">--}}
                                        {{--<button class="button is-link" type="submit">{{ __('Register') }}</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--<script>--}}
    {{--import RegisterCard from "../../js/components/RegisterCard";--}}
    {{--export default {--}}
        {{--components: {RegisterCard}--}}
    {{--}--}}
{{--</script>--}}
