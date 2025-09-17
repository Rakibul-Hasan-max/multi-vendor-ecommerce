@extends('layout')

@section('content')
    <h2>Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="number" step="0.01" name="price" placeholder="Price" required><br>
        <input type="number" name="quantity" placeholder="Quantity" required><br>
        <button type="submit">Save</button>
    </form>
@endsection
