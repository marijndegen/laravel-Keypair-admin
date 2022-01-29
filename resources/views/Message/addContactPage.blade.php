@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">

        </div>
        <h1>Add a new contact (with a public key)</h1>
        <div class="links">
            <form method="post" action="{{route('contact/add_contact_action')}}">
                @csrf
                @if(Session::has('message'))
                <div class="alert alert-success">
                    <p>{{Session::pull('message')}}</p>
                </div>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Full name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="public_key" placeholder="Public key"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add contact</button>
            </form>
        </div>
    </div>
</div>
@endsection