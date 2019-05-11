@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="row justify-content-center">
        <div class="col">
            <h2>Product</h2>
            <div>
                <a href="{{route('admin.products.create')}}" class="btn btn-primary">Tambah Produk</a>
            </div>
            <br/>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                <td>{{$product['price']}}</td>
                                <td>{{$product['created_at']}}</td>
                                <td width=5%>
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td width=5%>
                                    <a href="{{route('admin.products.show',$product->id)}}" class="btn btn-danger">Detail</a>
                                </td>
                                <td>                                                             
                                    <form action="{{route('admin.products.destroy',$product->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-primary" onclick="return confirm('Yakin Mau di Hapus ?')" type="submit">Delete</button>
                                    </form>
                                </td>
                            <tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection