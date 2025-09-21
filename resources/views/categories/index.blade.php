@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Slug</th><th>Created</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->slug }}</td>
                <td>{{ $cat->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('categories.edit', $cat) }}" class="btn btn-sm btn-secondary">Edit</a>

                    <form action="{{ route('categories.destroy', $cat) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                          onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">No categories yet.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
</div>
@endsection
