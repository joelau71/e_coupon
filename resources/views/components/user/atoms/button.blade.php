<button
    {!! $attributes->merge(['class' => 'inline-block cursor-pointer bg-green-600 text-white rounded px-6 py-2 hover:bg-green-500']) !!}
>
    {{ $slot }}
</button>