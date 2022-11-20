<label
    @isset($attributes["for"]) for="{{ $attributes['for'] }}" @endisset
    {!! $attributes->merge(['class' => 'inline-block cursor-pointer']) !!}
>
    {{ $slot }}
</label>