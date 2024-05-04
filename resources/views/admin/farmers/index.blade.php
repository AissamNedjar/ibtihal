@extends('admin.layouts.app')

@section('content')

<button type="button" class="btn btn-primary" onclick="window.location='{{ route('admin.farmers.create') }}'">Ajouter un agriculteur</button>

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
        @foreach($farmers as $farmer)
        <tr>
            <th scope="row">{{ $farmer->id }}</th>
            <td>{{ $farmer->name }}</td>
            <td>{{ $farmer->email }}</td>
            <td>{{ $farmer->phone }}</td>
            <td>
                <a href="{{ route('admin.farmers.show', $farmer->id) }}" class="btn btn-primary">Voir</a>
                <a href="{{ route('admin.farmers.edit', $farmer->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('admin.farmers.destroy', $farmer->id) }}" method="POST" style="display: inline;">
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