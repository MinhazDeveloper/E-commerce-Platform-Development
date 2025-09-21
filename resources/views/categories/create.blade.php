@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug (optional)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
            <small class="form-text text-muted">Leave empty to auto-generate from name.</small>
            @error('slug')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
