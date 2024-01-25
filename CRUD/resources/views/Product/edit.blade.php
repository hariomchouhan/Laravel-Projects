@extends('layouts.app')

@section('main')

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
        </div>
    @endif


    <div class="container">
        <h1>Edit Products</h1>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3 class="text-muted">Product Edit #{{$product->name}}</h3>
                    <form action="{{url('/')}}/products/{{$product->id}}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name', $product->name)}}" />
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" name="description" class="form-control" cols="30" rows="4">{{old('description', $product->description)}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" id="" value="{{old('image')}}">
                            <span class="text-danger">
                                @error('image')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection