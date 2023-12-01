@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-grary-500 font-bold mb-2 uppercase']) }}>
    {{ $value ?? $slot }}
</label>
