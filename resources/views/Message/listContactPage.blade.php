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
                <a class="btn btn-success listedbtn" href={{route('contact/encypt_page', $contact->id)}}> Encrypt</a>
                <a id="delete" class="btn btn-danger listedbtn" onclick="confirmDelete('{{$contact->id}}', '{{$contact->name}}', 'contact')"> Delete</a>
                <a class="btn btn-info listedbtn" href={{route('contact/downloadPublicKeyFromContact',  $contact->id)}}> Download Public Key</a>
            </td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{substr($contact->public_key, 0, 200)}}...</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection