@extends('layout.app')

@section('content')
<h2>Encrypt a message for {{$contact->name}}</h2>
@if(Session::has('encryptedText'))
<div class="alert alert-success">
    <pre>{{Session::pull('encryptedText')}}</pre>
</div>
@endif
<hr>
<form method="post" action="/contact/encrypt_action/{{$contact->id}}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" rows="4" placeholder="Encrypt a single message that only {{$contact->name}} can read" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection