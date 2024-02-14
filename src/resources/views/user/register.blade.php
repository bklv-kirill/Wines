@extends('layouts.user')

@section('content')
    @section('title', "Rigster")
        
    <x-forms.form :action="route('user.store')" method="POST">
        <x-forms.input name="login" type="text" :value="old('login')" for="login">
            Login
        </x-forms.input>
        <x-forms.input name="email" type="text" :value="old('email')" for="email">
            Email
        </x-forms.input>
        <x-forms.input name="password" type="password" for="password">
            Password
        </x-forms.input>

        <button type="submit" class="btn btn-primary">Register</button>
        <a href="{{ route("user.login") }}" class="ms-1">Login</a>

        @if ($errors->has("register"))
            <x-forms.error>
                {{ $errors->first("register") }}
            </x-forms.error>
        @endif
    </x-forms.form>
@endsection