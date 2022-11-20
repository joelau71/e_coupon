<x-user.atoms.row>
    <x-user.atoms.label for="{{ $attributes['field'] }}" class="{{ $attributes['required'] ? 'required' : ''}}">
        {{ $attributes['title'] }}
    </x-user.atoms.label>
    <x-user.atoms.text
        placeholder="{{ $attributes['placeholder'] ? $attributes['placeholder'] : '' }}"
        id="{{ $attributes['field'] }}"
        name="{{ $attributes['field'] }}"
        value="{{ isset($attributes['value']) ? $attributes['value'] : '' }}"
    />
    @error($attributes['field'])
        <x-user.atoms.error>
            {{ $message }}
        </x-user.atoms.error>
    @enderror
</x-user.atoms.row>