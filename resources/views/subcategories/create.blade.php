@extends('layouts.app')

@section('content')
<h1>Create Subcategory</h1>

<form action="{{ route('subcategories.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    
    <label>Category:</label>
    <select name="category_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <button type="submit">Create</button>
</form>
@endsection
