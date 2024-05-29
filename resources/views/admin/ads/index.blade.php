@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ads as $ads)
        <tr>
            <th scope="row">{{ $ads->id }}</th>
            <td>{{ $ads->title }}</td>
            <td>{{ $ads->description }}</td>
            <td>{{ str_replace(['0', '1', '2'], ['En attente', 'Accepté', 'Rejeté'], $ads->is_accepted) }}</td>
            <td>
                <a href="{{ route('admin.ads.show', $ads->id) }}" class="btn btn-primary">Voir</a>
                @if($ads->is_accepted == 0)
                    <a href="{{ route('admin.ads.approve', $ads->id) }}" class="btn btn-info">Accepter</a>
                    <a href="{{ route('admin.ads.reject', $ads->id) }}" class="btn btn-warning">Rejeter</a>
                @endif
                <form action="{{ route('admin.ads.destroy', $ads->id) }}" method="POST" style="display: inline;">
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