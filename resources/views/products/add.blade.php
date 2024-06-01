@extends ('layouts.master')

@section ('content')
<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Produk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.save') }}" method="post" accept-charset="UTF-8">
                        @csrf
                        <div class="form-group">
                            <label for="title">Nama Produk</label>
                            <input name="name" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Masukkan nama produk">
                            <small id="titleHelp" class="form-text text-muted">Masukkan nama produk yang dijual</small>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Produk</label>
                            <textarea name="description" class="form-control" id="desc" aria-describedby="descHelp" placeholder="Masukkan keterangan produk" rows="4"></textarea>
                            <small id="descHelp" class="form-text text-muted">Masukkan keterangan produk yang dijual</small>
                        </div>
                        <div class="form-group">
                            <label for="desc">Image</label>
                            <textarea name="image" class="form-control" id="desc" aria-describedby="descHelp" placeholder="Masukkan keterangan produk" rows="4"></textarea>
                            <small id="descHelp" class="form-text text-muted">Masukkan image produk yang dijual</small>
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
