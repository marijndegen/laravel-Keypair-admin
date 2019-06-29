@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Keypair admin
        </div>

        <div class="links">
            <a href="{{route('add_key_meta_data')}}">Generate a new keypair</a>
            <a href="{{route('select_key')}}">Decrypt a message using an existing keypair</a>
        </div>
    </div>
</div>

@endsection