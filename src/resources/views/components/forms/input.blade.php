<div class="mb-3">
    <label for="{{ $attributes["for"] }}" class="form-label">{{ $slot }}</label>
    <input name="{{ $attributes["name"] }}" type="{{ $attributes["type"] }}" value="{{ $attributes["value"] }}" class="form-control" id="{{ $attributes["for"] }}">
    @if ($errors->has($attributes["for"]))
        <x-forms.error>
            {{ $errors->first($attributes["for"]) }}
        </x-forms.error>
    @endif
</div>