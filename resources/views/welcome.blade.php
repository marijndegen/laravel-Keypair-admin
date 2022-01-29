@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">

        </div>
        <h1>Keypair admin</h1>
        <div class="links">
            <a href="{{route('rsa/create_key_pair_page')}}">Create a new keypair</a>
            <a href="{{route('contact/list_key_pair_page')}}">List key pairs (decrypt)</a>

            <a href="{{route('contact/add_contact_page')}}">Add contact</a>
            <a href="{{route('contact/list_contact_page')}}">List contacts (encrypt)</a>
        </div>
    </div>
</div>
@endsection