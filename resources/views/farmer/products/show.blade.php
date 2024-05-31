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
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->farmer->name }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }} Da</td>
        </tr>
    </tbody>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{!! nl2br($product->description) !!}</td>
        </tr>
    </tbody>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Images</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100%;"></td>
        </tr>
    </tbody>
</table>

@endsection