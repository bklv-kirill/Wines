@extends('layouts.main')

@section('content')
    @section('title', "Favorites")
    
    <h2 class="text-center m-3">Favorites Wines</h2>

    <div class="container">
        <x-forms.form :action="route('favorites.index', Auth::user() )" method="GET">
            <x-forms.input name="name" type="text" :value="$filters['name'] ?? ''" for="name">
                Name
            </x-forms.input>

            <x-forms.select name="type" label="Type">
                <option value="0" {{ (int)$filters["type"] === 0 ? "selected" : "" }}>All Wines</option>
                <option value="1" {{ (int)$filters["type"] === 1 ? "selected" : "" }}>Red</option>
                <option value="2" {{ (int)$filters["type"] === 2 ? "selected" : "" }}>White</option>
                <option value="3" {{ (int)$filters["type"] === 3 ? "selected" : "" }}>Pink</option>
            </x-forms.select>

            <x-forms.select name="order" label="Order By">
                <option value="new" {{ $filters["order"] === "new" ? "selected" : "" }}>Order By Date: New</option>
                <option value="old" {{ $filters["order"] === "old" ? "selected" : "" }}>Order By Date: Old</option>
                <option value="up" {{ $filters["order"] === "up" ? "selected" : "" }}>Order By Price: Up</option>
                <option value="down" {{ $filters["order"] === "down" ? "selected" : "" }}>Order By Price: Down</option>
            </x-forms.select>

            <button type="submit" class="btn btn-primary mt-3">Search</button>
        </x-forms.form>
    </div>

    <hr class="m-3">

    <div class="d-flex flex-wrap justify-content-center">
        @forelse ($favorites as $favorite)
            <x-wines.wine-card :wine="$favorite"/>
        @empty
            <h2 class="text-center m-3">No Favorite Wines</h2>
        @endforelse
    </div>

    <div class="container">
        {{ $favorites->withQueryString()->links() }}
    </div>
@endsection