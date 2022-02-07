@extends('Layout.app')

@section('content')
<div class="container">
    <h2>Decrypt a message using private key {{$keyPair->description}}</h2>
    @include('Elements.messageBox', ['title' => 'Encrypted message:'])

    <hr>
    <form method="post" action="/contact/decrypt_action/{{$keyPair->id}}">
        @csrf
        <div class="form-group">
            @error('message')
            <div class="alert alert-danger ">{{trans('validation.encyptedmessage')}} {{ trans($message) }}</div>
            @enderror
            <textarea class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="Decrypt a single message that is meant only to be decrypted by the key: {{$keyPair->description}}" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection