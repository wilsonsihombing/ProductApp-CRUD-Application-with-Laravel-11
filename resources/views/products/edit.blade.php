@extends('layouts.master')

@section('content')
<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Produk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="post" accept-charset="UTF-8">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Masukkan nama produk" value="{{ $product->name }}">
                            <small id="nameHelp" class="form-text text-muted">Masukkan nama produk yang dijual</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi Produk</label>
                            <textarea name="description" class="form-control" id="description" aria-describedby="descHelp" placeholder="Masukkan keterangan produk" rows="4">{{ $product->description }}</textarea>
                            <small id="descHelp" class="form-text text-muted">Masukkan keterangan produk yang dijual</small>
                        </div>
                        <div class="form-group">
                            <label for="image">URL Gambar Produk</label>
                            <input name="image" type="text" class="form-control" id="image" aria-describedby="imageHelp" placeholder="Masukkan URL gambar produk" value="{{ $product->image }}">
                            <small id="imageHelp" class="form-text text-muted">Masukkan URL gambar produk yang dijual</small>
                        </div>
                        <div class="form-group">
                            <label>Gambar Produk Saat Ini</label>
                            <div>
                                <img src="{{ $product->image }}" alt="Gambar Produk" class="img-fluid" id="currentImage" width="150">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
