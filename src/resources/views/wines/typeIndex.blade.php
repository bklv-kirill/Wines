@extends('layouts.main')

@section('content')
    @section('title', $type)
    
    <div class="container">
        <x-forms.form :action="route('wines.typeIndex', $type)" method="GET">
            <x-forms.input name="name" type="text" :value="$filters['name'] ?? ''" for="name">
                Name
            </x-forms.input>

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
        @forelse ($wines as $wine)
            <x-wines.wine-card :wine="$wine"/>
        @empty
            <h2 class="text-center m-3">No Wines</h2>
        @endforelse
    </div>

    <div class="container">
        {{ $wines->withQueryString()->links() }}
    </div>
@endsection