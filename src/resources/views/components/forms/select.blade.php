<div class="mt-3">
    <label class="form-label">{{ $attributes["label"] }}</label>
    <select name="{{ $attributes["name"] }}" class="form-select" aria-label="Default select example">
        {{ $slot }}
    </select>
</div>