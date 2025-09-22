@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Products (Grouped by Subcategory)</h1>

    @foreach($subcategories as $sub)
        <div class="mb-5">
            <h3>
                <a href="{{ route('products.bySubcategory', $sub) }}">
                    {{ $sub->name }}
                </a>
                <small class="text-muted"> ({{ $sub->products->count() }} items)</small>
            </h3>

            <div class="row">
                @foreach($sub->products as $product)
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
            </div> {{-- row --}}
        </div>
    @endforeach
</div>
@endsection
