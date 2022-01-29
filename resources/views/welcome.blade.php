@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Keypair admin
        </div>

        <div class="links">
            <a href="{{route('create_key_pair_page')}}">Create a new keypair</a>
            <a href="{{route('key_pair/list_key_pair_page')}}">List key pairs (decrypt)</a>

            <a href="{{route('public_key/add_public_key_page')}}">Add contact</a>
            <a href="{{route('public_key/list_public_key_page')}}">List contacts</a>
            <a href="{{route('TEST')}}">test message with public key 3</a>
        </div>
    </div>
</div>
@endsection