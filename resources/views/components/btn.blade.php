@props([
    'type' => 'default',
])
<button type="submit" class="btn btn-{{ $type }}" {{ $attributes }}>
    {{ $slot }}
</button>
