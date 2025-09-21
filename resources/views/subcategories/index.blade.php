@extends('layouts.app')

@section('content')
<h1>Subcategories</h1>
<a href="{{ route('subcategories.create') }}">Create New Subcategory</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    @foreach($subcategories as $sub)
    <tr>
        <td>{{ $sub->id }}</td>
        <td>{{ $sub->name }}</td>
        <td>{{ $sub->category->name }}</td>
        <td>
            <a href="{{ route('subcategories.edit', $sub->id) }}">Edit</a>
            <form action="{{ route('subcategories.destroy', $sub->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $subcategories->links() }}
@endsection
