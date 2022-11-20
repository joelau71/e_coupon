<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Post', "link" => route("user.post.index")],
        ["name" => "Order"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <form action="{{ route('user.post.order2')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="order">
                @foreach ($posts as $item)
                    <x-user.atoms.order-item>
                        <div >{{ $item->title }}</div>
                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                    </x-user.atoms.order-item>
                @endforeach
            </div>
        
            <hr class="my-10">
            <div class="text-right">
                <x-user.atoms.link href="{{ url()->previous() }}">
                    Back
                </x-user.atoms.link>
                <x-user.atoms.button id="save">
                    Save
                </x-user.atoms.button>
            </div>
        </form>
    
        @push('footer')
            <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
            <script src="{{ asset("js/jquery-ui.min.js") }}"></script>
            <script>
                $("#order").sortable();
            </script>
        @endpush
    </x-user.atoms.container>
</x-user.layouts.app>

