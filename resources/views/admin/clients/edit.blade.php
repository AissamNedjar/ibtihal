@extends('admin.layouts.app')

@section('content')

<form action="{{ route('admin.clients.update', $admin->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nom et prénom</label>
        <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}">
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="password">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="button" class="btn btn-danger" onclick="window.location='{{ route('admin.clients.index') }}'">Annuler</button>
</form>

@endsection