<form action="{{ $action }}" method="{{ in_array($method, ["GET", "POST"]) ? $method : "POST" }}" class="{{ $attributes['noClass'] ?? 'm-3' }}">
    @if ($method !== "GET")
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>