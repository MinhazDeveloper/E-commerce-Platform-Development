@extends('layouts.app')

@section('content')
<h1>Edit Subcategory</h1>

<form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $subcategory->name) }}">
    
    <label>Category:</label>
    <select name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $subcategory->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
@endsection
