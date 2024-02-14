<div class="card m-3" style="width: 18rem;">
    <img src="{{ asset("images/$wine->type_id.jpg") }}" class="card-img-top" alt="wine-img">
    <div class="card-body">
        <h5 class="card-title">{{ $wine->name }}</h5>
        <p class="card-text">{{ implode("", array_slice(str_split($wine->discription), 0, 50)) }}</p>
        <p class="card-text">Price: {{ $wine->price }}$</p>
        <p class="card-text">Date: {{ $wine->date }}</p>
        <a href="{{ route("wines.show", ["type" => $wine->type->name, "wine" => $wine]) }}" class="btn btn-primary">Show More</a><br>
        @if (Auth::check())
            @if (Gate::check("add_to_favorite", $wine))
                <x-forms.form :action="route('favorites.store', $wine)" method="POST" noClass>
                    <button type="submit" class="btn btn-success mt-2">Add to Favorite</button>
                </x-forms.form>
            @else
                <x-forms.form :action="route('favorites.delete', $wine)" method="DELETE" noClass>
                    <button type="submit" class="btn btn-danger mt-2">Delete From Favorite</button>
                </x-forms.form>
            @endif
        @endif
    </div> 
</div>