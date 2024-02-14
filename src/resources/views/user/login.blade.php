@extends('layouts.user')

@section('content')
    @section('title', "Login")
        
    <x-forms.form :action="route('user.auth')" method="POST">
        <x-forms.input name="login" type="text" :value="old('login')" for="login">
            Login
        </x-forms.input>
        <x-forms.input name="password" type="password" for="password">
            Password
        </x-forms.input>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route("user.register") }}" class="ms-1">Register</a>
        @if ($errors->has("auth"))
            <x-forms.error>
                {{ $errors->first("auth") }}
            </x-forms.error>
        @endif
    </x-forms.form>
@endsection