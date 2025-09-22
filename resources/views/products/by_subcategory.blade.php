@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.grouped') }}" class="btn btn-sm btn-secondary mb-3">← Back to All Products</a>

    <h1>{{ $subcategory->name }}</h1>
    <p>Category: <strong>{{ $subcategory->category->name ?? 'N/A' }}</strong></p>

    @if($subcategory->products->isEmpty())
        <div class="alert alert-info">এই সাবক্যাটেগরিতে কোনো প্রোডাক্ট নেই।</div>
    @else
        <div class="row">
            @foreach($subcategory->products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height:160px; object-fit:cover;" alt="{{ $product->name }}">
                        @else
                            <div style="height:160px; background:#eee; display:flex; align-items:center; justify-content:center;">No Image</div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-truncate">{{ $product->description }}</p>
                            <div class="mt-auto">
                                @if($product->old_price)
                                    <small class="text-muted"><del>{{ number_format($product->old_price, 2) }}</del></small><br>
                                @endif
                                <strong>৳ {{ number_format($product->new_price, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
