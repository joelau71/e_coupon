<x-user.atoms.row>
    <x-user.atoms.label for="{{ $attributes['field'] }}" class="{{ $attributes['required'] ? 'required' : ''}}">
        {{ $attributes['title'] }}
    </x-user.atoms.label>
    <x-user.atoms.textarea
        name="{{ $attributes['field'] }}"
        placeholder="{{ $attributes['placeholder'] ? $attributes['placeholder'] : '' }}"
        isRichText="{{ $attributes['isRichText'] }}"
    >
        {{ $slot }}
    </x-user.atoms.textarea>
    @error($attributes['field'])
        <x-user.atoms.error>
            {{ $message }}
        </x-user.atoms.error>
    @enderror
</x-user.atoms.row>
