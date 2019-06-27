@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Generating a 6144 bit RSA key
        </div>



        <div class="links">
            <form method="post" action="{{route('new_key')}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">Generate key</button>
            </form>
        </div>
    </div>
</div>
@endsection