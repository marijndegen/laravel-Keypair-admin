@extends('layout.app')

@section('content')
<h2>Decrypt a message</h2>
@if(Session::has('plainText'))
<div class="alert alert-success">
    <pre>{{Session::pull('plainText')}}</pre>
</div>
@endif
<hr>
<form method="post" action="/key_pair/decrypt_action/{{$keyPair->id}}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" rows="4" placeholder="Decrypt a single unformatted message from the key:" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection