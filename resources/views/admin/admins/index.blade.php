@extends('admin.layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="window.location='{{ route('admin.admins.create') }}'">Ajouter un administrateur</button>

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
        @foreach($admins as $admin)
        <tr>
            <th scope="row">{{ $admin->id }}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone }}</td>
            <td>
                <a href="{{ route('admin.admins.show', $admin->id) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
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