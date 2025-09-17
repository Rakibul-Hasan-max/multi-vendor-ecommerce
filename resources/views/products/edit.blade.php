@extends('layout')

@section('content')
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required><br>
        <textarea name="description">{{ $product->description }}</textarea><br>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required><br>
        <input type="number" name="quantity" value="{{ $product->quantity }}" required><br>
        <button type="submit">Update</button>
    </form>
@endsection
