@props(['disabled' => false])

<input
    type="password"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'w-full rounded mt-2 p-2 border focus:outline-none']) !!}
/>