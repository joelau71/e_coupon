<nav class="bg-gray-200 p-3 rounded font-sans w-full mb-6">
    <ol class="list-reset flex text-gray-700 capitalize">
        @foreach ($attributes["breadcrumbs"] as $breadcrumb)
            @if ($loop->index != 0)
                <li><span class="mx-2">/</span></li>
            @endif
            <li>
                @isset($breadcrumb["link"])
                    <a href="{{ $breadcrumb["link"] }}" class="hover:text-green">{{ $breadcrumb["name"] }}</a>
                @else
                    <span>{{ $breadcrumb["name"] }}</span>
                @endisset
            </li>
        @endforeach
    </ol>
</nav>