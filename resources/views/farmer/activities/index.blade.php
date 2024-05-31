@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numéro</th>
            <th scope="col">Type</th>
            <th scope="col">Statut</th>
            <th scope="col">Date début</th>
            <th scope="col">Date fin</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <th scope="row">{{ $activity->id }}</th>
            <td>{{ $activity->number }}</td>
            <td>{{ $activity->type }}</td>
            <td>{{ $activity->status }}</td>
            <td>{{ $activity->start_date }}</td>
            <td>{{ $activity->date_end }}</td>
            <td>{{ str_replace(['0', '1', '2'], ['En attente', 'Accepté', 'Rejeté'], $activity->is_accepted) }}</td>
            <td>
                <a href="{{ route('admin.activities.show', $activity->id) }}" class="btn btn-primary">Voir</a>
                @if($activity->is_accepted == 0)
                    <a href="{{ route('admin.activities.approve', $activity->id) }}" class="btn btn-info">Accepter</a>
                    <a href="{{ route('admin.activities.reject', $activity->id) }}" class="btn btn-warning">Rejeter</a>
                @endif
                <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" style="display: inline;">
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