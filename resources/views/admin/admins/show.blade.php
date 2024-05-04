@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nom et prénom</th>
            <th scope="col">Adresse e-mail</th>
            <th scope="col">Téléphone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone }}</td>
        </tr>
    </tbody>
</table>

@endsection