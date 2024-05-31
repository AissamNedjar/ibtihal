@extends('admin.layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $activity->id }}</th>
            <td>{{ $activity->title }}</td>
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
            <td>{!! nl2br($activity->description) !!}</td>
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
            <td><img src="{{ asset('uploads/' . $activity->images) }}" alt="{{ $activity->name }}" style="max-width: 100%;"></td>
        </tr>
    </tbody>
</table>

@endsection