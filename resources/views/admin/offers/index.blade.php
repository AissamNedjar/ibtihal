@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre d'employés</th>
            <th scope="col">Salaire</th>
            <th scope="col">Description</th>
            <th scope="col">Conditions</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($offres as $offre)
        <tr>
            <th scope="row">{{ $offre->id }}</th>
            <td>{{ $offre->numbers_employee }}</td>
            <td>{{ $offre->salary }}</td>
            <td>{{ $offre->description }}</td>
            <td>{{ $offre->conditions }}</td>
            <td>{{ str_replace(['0', '1', '2'], ['En attente', 'Accepté', 'Rejeté'], $offre->is_accepted) }}</td>
            <td>
                <a href="{{ route('admin.offres.show', $offre->id) }}" class="btn btn-primary">Voir</a>
                @if($offre->is_accepted == 0)
                    <a href="{{ route('admin.offres.approve', $offre->id) }}" class="btn btn-info">Accepter</a>
                    <a href="{{ route('admin.offres.reject', $offre->id) }}" class="btn btn-warning">Rejeter</a>
                @endif
                <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST" style="display: inline;">
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