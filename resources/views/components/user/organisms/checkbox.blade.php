<div class="mt-12">
    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
        <input type="hidden" name="{{ $attributes['field'] }}" value="0" />
        <input
            type="checkbox"
            id="{{ $attributes['field'] }}"
            name="{{ $attributes['field'] }}"
            value="1"
            @if($attributes["checked"] == 1) checked @endif
            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer focus:outline-none focus:ring-offset-0 focus:ring-transparent" />
        <label
            for="{{ $attributes['field'] }}"
            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">
        </label>
    </div>
    <label for="{{ $attributes['field'] }}" class="text-gray-700 cursor-pointer select-none">
        {{ $attributes['title'] }}
    </label>
</div>