@extends('layouts.main')

@section('content')
@section('title', 'Create new Wine')

<div class="container">
    <x-forms.form :action="route('wines.store')" method="POST">

        <x-forms.input name="name" type="text" :value="old('name')" for="name">
            Name
        </x-forms.input>

        <x-forms.input name="discription" type="text" :value="old('discription')" for="discription">
            Discription
        </x-forms.input>

        <x-forms.input name="price" type="number" :value="old('price')" for="price">
            Price
        </x-forms.input>

        <x-forms.input name="date" type="date" :value="old('date')" for="date">
            Date
        </x-forms.input>

        <x-forms.select name="type_id" label="Type">
            @forelse ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @empty
                <option value="">No Types</option>
            @endforelse
        </x-forms.select>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </x-forms.form>
</div>
@endsection
