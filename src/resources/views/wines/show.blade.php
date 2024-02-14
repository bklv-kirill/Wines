@extends('layouts.main')

@section('content')
@section('title', $wine->name)

<div class="container">
    <div class="card m-3">
        <img src="{{ asset("images/$wine->type_id.jpg") }}" style="max-height: 300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $wine->name }}</h5>
            <p class="card-text">{{ $wine->discription }}</p>
            <p class="card-text">Price: {{ $wine->price }}$</p>
            <p class="card-text">Date: {{ $wine->date }}</p>

            @if (Auth::check())
                @if (Gate::check('add_to_favorite', $wine))
                    <x-forms.form :action="route('favorites.store', $wine)" method="POST" noClass>
                        <button type="submit" class="btn btn-success">Add To Favorite</button>
                    </x-forms.form>
                @else
                    <x-forms.form :action="route('favorites.delete', $wine)" method="DELETE" noClass>
                        <button type="submit" class="btn btn-danger">Delete From Favorite</button>
                    </x-forms.form>
                @endif
                @can('is_admin')
                    <div class="mt-1">
                        <x-forms.form :action="route('wines.delete', ['type' => $wine->type->name, 'wine' => $wine])" method="DELETE" noClass>
                            <button type="submit" class="btn btn-danger">Delete Wine</button>
                        </x-forms.form>
                    </div>
                @endcan
            @endif
        </div>
    </div>
</div>
@endsection
