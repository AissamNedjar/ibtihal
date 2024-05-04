@extends('admin.layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="window.location='{{ route('admin.clients.create') }}'">Ajouter un client</button>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom et prénom</th>
            <th scope="col">Adresse e-mail</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <th scope="row">{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>
                <a href="{{ route('admin.clients.show', $client->id) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection