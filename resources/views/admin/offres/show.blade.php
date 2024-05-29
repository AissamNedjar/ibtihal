@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre d'employés</th>
            <th scope="col">Salaire</th>
            <th scope="col">Conditions</th>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $offre->id }}</th>
            <td>{{ $offre->numbers_employee }}</td>
            <td>{{ $offre->salary }}</td>
            <td>{{ $offre->conditions }}</td>
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
            <td>{!! nl2br($offre->description) !!}</td>
        </tr>
    </tbody>
</table>

@endsection