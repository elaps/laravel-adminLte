@props([
    'type' => 'default',
])
<button type="submit" class="btn btn-{{ $type }}">
    {{ $slot }}
</button>
