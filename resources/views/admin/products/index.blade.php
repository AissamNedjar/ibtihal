@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Agriculteur</th>
            <th scope="col">Nom produit</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col">Statut</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->farmer->name }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }} Da</td>
            <td>{{ str_replace(['0', '1', '2'], ['En attente', 'Accepté', 'Rejeté'], $product->is_accepted) }}</td>
            <td>
                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">Voir</a>
                @if($product->is_accepted == 0)
                    <a href="{{ route('admin.products.approve', $product->id) }}" class="btn btn-info">Accepter</a>
                    <a href="{{ route('admin.products.reject', $product->id) }}" class="btn btn-warning">Rejeter</a>
                @endif
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
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