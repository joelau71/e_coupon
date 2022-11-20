@extends('admin.layouts.app')

@section('content')
    @php
    $breadcrumbs = [
        ['name' => 'Users', "link" => route("admin.index")],
        ["name" => "Edit"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("patch")
            <x-user.atoms.required />
        
            <x-user.organisms.text title="First Name" field="first_name" required="true" value="{{$user->first_name}}" />
            <x-user.organisms.text title="Last Name" field="last_name" required="true" value="{{$user->last_name}}" />
            <x-user.organisms.text title="Score" field="score" required="true" value="{{$user->score->score}}" />


            <hr class="my-10">
            <div class="text-right">
                <x-user.atoms.link href="{{ route('admin.index') }}">
                    Back
                </x-user.atoms.link>
                <x-user.atoms.button>
                    Save
                </x-user.atoms.button>
            </div>
        </form>
    </x-user.atoms.container>
@endsection

