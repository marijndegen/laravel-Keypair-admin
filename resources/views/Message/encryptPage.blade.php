@extends('layout.app')

@section('content')
<div class="container">
    <h2>Encrypt a message for {{$contact->name}}</h2>
    @include('Elements.messageBox', ['title' => 'Encrypted message:'])
    <hr>
    <form method="post" action="/contact/encrypt_action/{{$contact->id}}">
        @csrf
        <div class="form-group">
            @error('message')
            <div class="alert alert-danger ">{{ trans($message) }}</div>
            @enderror
            <textarea class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="Encrypt a single message that only {{$contact->name}} can read" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection