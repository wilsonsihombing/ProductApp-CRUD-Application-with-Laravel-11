@extends('layouts.master')

@section('content')
<section class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h4>Daftar Produk</h4>
        <a href="{{ route('products.add') }}" class="btn btn-primary">
            <span>+ Tambah Produk</span>
        </a>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="search" class="form-control" placeholder="Cari produk...">
        </div>
        <!-- Tambahkan filter kategori jika diperlukan -->
        <!-- <div class="col-md-4">
            <select id="filter-category" class="form-control">
                <option value="">Pilih Kategori</option>
                <option value="electronics">Elektronik</option>
                <option value="fashion">Fashion</option>
                <option value="food">Makanan</option>
                <!-- Tambahkan kategori lainnya sesuai kebutuhan -->
            <!-- </select> -->
        <!-- </div> --> 
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <!-- <caption>Daftar Produk</caption> -->
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Deskripsi Produk</th>
                    <th scope="col">Image</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="product-list">
                @if($products->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Data kosong</td>
                    </tr>
                @else
                    @foreach($products as $key => $item)
                        <tr data-category="{{ $item->category }}">
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->name }}" style="max-width: 100px;">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <form action="{{ route('products.delete', $item->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</section>

<script>
    document.getElementById('search').addEventListener('input', function() {
        var query = this.value.toLowerCase();
        var products = document.querySelectorAll('#product-list tr');
        products.forEach(function(product) {
            var name = product.querySelector('td:nth-child(2)').innerText.toLowerCase();
            var description = product.querySelector('td:nth-child(3)').innerText.toLowerCase();
            if (name.includes(query) || description.includes(query)) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    });

    document.getElementById('filter-category').addEventListener('change', function() {
        var category = this.value.toLowerCase();
        var products = document.querySelectorAll('#product-list tr');
        products.forEach(function(product) {
            var productCategory = product.getAttribute('data-category').toLowerCase();
            if (category === '' || productCategory === category) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    });
</script>
@endsection
