@extends('admin.layouts.app')

@section('content')
    @php
    $breadcrumbs = [
        ['name' => 'Videos List'],
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />
    <x-user.atoms.container>
        <div class="flex justify-between items-center">
            <div></div>
            <div>
                {{-- <x-user.atoms.link href="{{ route('admin.order') }}">
                    Order
                </x-user.atoms.link> --}}
                {{-- <x-user.atoms.link href="{{ route('admin.create') }}">
                    ADD
                </x-user.atoms.link> --}}
            </div>
        </div>
    
        <x-user.atoms.header-banner>
            <div class="flex items-center flex-1 cursor-pointer">
                User
            </div>
            <div class="flex-1">
                Actions
            </div>
        </x-user.atoms.header-banner>
        
        @foreach ($users as $user)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">{{ $user->first_name }}{{ $user->last_name }}</div>
                <div class="flex-1">
                    <x-user.atoms.link href="{{ route('admin.edit', $user->id) }}">
                        Edit
                    </x-user.atoms.link>
                </div>
            </div>
        @endforeach
    </x-user.atoms.container>

@endsection