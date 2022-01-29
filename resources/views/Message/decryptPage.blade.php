@extends('layout.app')

@section('content')
<div class="container">
    <h2>Decrypt a message using private key {{$keyPair->description}}</h2>
    @if(Session::has('plainText'))
    <div class="alert alert-success">
        <pre>{{Session::pull('plainText')}}</pre>
    </div>
    @endif
    <hr>
    <form method="post" action="/contact/decrypt_action/{{$keyPair->id}}">
        @csrf
        <div class="form-group">
            <textarea class="form-control" rows="4" placeholder="Decrypt a single message that is meant only to be decrypted by the key: {{$keyPair->description}}" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection