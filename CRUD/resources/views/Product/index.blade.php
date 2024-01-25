@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-right">
            <a href="/products/create" class="btn btn-success mt-2">New Product</a>
        </div>
        <h1>Products</h1>

        <table class="table table-hover mt-2">
            <thead class="bg-success">
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                    <td>
                        <img src="products/{{$product->image}}" class="rounded-circle" alt="" width="50" height="50">
                    </td>
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <!-- <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">Delete</a> -->

                        <form action="products/{{$product->id}}/delete" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                </td>
                </tr>
                @endforeach
            </tbody>

            
        </table>
        {{ $products->links() }}
    </div>

    @endsection
