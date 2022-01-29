@extends('layout.app')

@section('content')
<h2>List contacts</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Options</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Phone</th>
            <th scope="col">Public key</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->name}}</td>
            <td>
                <a class="btn btn-success listedbtn" href={{route('contact/encypt_page', ['contactid' => $contact->id])}}> Encrypt</a>
                {{--<a class="btn btn-danger listedbtn" href={{route('rsa/key_pair/delete', ['key_id' => $keyPair->id])}} onclick="return confirm('Are you sure?')"> Delete</a>--}}
                <a class="btn btn-info listedbtn" href={{route('contact/downloadPublicKeyFromContact', ['key_id' => $contact->id])}}> Download Public Key</a>
            </td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{substr($contact->public_key, 0, 200)}}...</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection