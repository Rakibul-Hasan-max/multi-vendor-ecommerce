@extends('layout')

@section('content')
    <h2>Products</h2>
    <a href="{{ route('products.create') }}">Add Product</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Name</th><th>Price</th><th>Qty</th><th>Actions</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $products->links() }}
    </div>
@endsection
