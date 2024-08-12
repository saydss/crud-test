@extends('layouts.layout')

@section('content')
    <section class="breadcrumbs" style="background-color: #FFf; padding-left: 8.5rem;">
        <div class="container">
            <div class=" my-auto d-flex justify-content-between align-items-center">
                <h2>Home</h2>
                <ul class="my-auto" style="list-style-type: none;">
                    <li><a href="#">Home</a></li>

                </ul>
            </div>
        </div>
    </section>
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <form method="GET" action="{{ route('barangs.index') }}" class="mb-4">
                @csrf
                <div class="tab-class text-center ">
                    <div class="row g-4">
                        <div class="col-lg-12 d-flex align-items-center justify-content-around">
                            <div class="me-5">
                                <h1>Products</h1>
                            </div>


                            <form action="{{ route('barangs.index') }}" method="GET" class="d-flex mb-2">
                                <div class=" px-5 input-group">
                                    <input class="form-control me-2" type="search" placeholder="Cari nama barang"
                                        aria-label="Search" value="{{ request()->search }}">
                                    <button class="btn btn-outline-success" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <div class="tab-class text-center d-flex mb-3">


                <form method="GET" action="{{ route('barangs.index') }}" class="form-inline d-flex">
                    <div class="form-group d-flex me-3 align-items-center">
                        <label class="w-50 text-center" for="sort">Sort By:</label>
                        <select id="sort" class="form-control ms-0">
                            <option value="">Sort By</option>
                            <option value="nama_barang">Nama Ascending</option>
                            <option value="nama_barang">Nama Descending</option>
                        </select>
                    </div>

                    <div class="form-group d-flex w-0 ">
                        <label class="me-2 my-auto" for="filter">Stok:</label>
                        <select name="filter" id="filter" class="form-control fs-6 w-100" onchange="this.form.submit()">
                            <option value="">Pilih </option>
                            <option value="in_stock" {{ request('filter') == 'in_stock' ? 'selected' : '' }}>In
                                Stock
                            </option>
                            <option value="out_of_stock" {{ request('filter') == 'out_of_stock' ? 'selected' : '' }}>Out
                                of
                                Stock</option>
                        </select>
                    </div>
                </form>

            </div>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade mb-3 show p-0 active">
                    <div class="row g-4" id="product-list">
                        @foreach ($barangs as $barang)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item" data-name="{{ $barang->nama_barang }}">
                                    <div class="fruite-img"
                                        style="position: relative; width: 100%; height:200px;  overflow: hidden;">
                                        <img src="{{ asset('storage/foto_barang/' . $barang->foto_barang) }}"
                                            style=" width:100%; height:100%; object-fit: cover;">
                                    </div>

                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{ $barang->nama_barang }}</h4>
                                        <p>Stok Barang {{ $barang->stok }}</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">Rp.{{ $barang->harga_jual }}</p>
                                            <a href="#"
                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{ $barangs->links('pagination::customb5') }}
        </div>
    </div>

    </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="py-5" style="background-color: #45595b; color:#FFf">
        <div class="footer-top ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 col-md-6 footer-links text-start ">
                        <h3 class="pt-4" style="font-size: 32px;">KONTAK</h3>
                        <p class="lh-lg">
                            <br />
                            <i class="bi bi-telephone-fill me-3"> 0123456789</i>
                            <br />
                            <i class="bi bi-archive me-3">024 - 7460063</i>
                            <br />
                            <i class="bi bi-geo-alt-fill me-3">Jl. Dukuh VII Gg. L No.450</i>
                            <br />
                            <a id="footerEmail" href="https://www.linkedin.com/in/sayid-miqdad/"
                                class="text-white bi bi-envelope me-1">
                                https://www.linkedin.com/in/sayid-miqdad/</a>
                            <br />
                            <a id="footerEmail" href="https://github.com/saydss" class=" text-white bi bi-intersect me-1">
                                https://github.com/saydss</a>
                            <br />
                        </p>
                        <br>
                        <br>
                        <br>

                        <div class="container footer-bottom clearfix d-flex mt-5 ps-0">
                            <div class="copyright align-self-end mt-auto">
                                &copy; Copyright <strong><span>Sayid Miqdad</span></strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 footer-links d-flex justify-content-center">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.246389308656!2d106.82345579999999!3d-6.2312145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f07f16cd8d%3A0x5e3abaeb7e450ff4!2sPT%20Sree%20International%20Indonesia!5e0!3m2!1sen!2sid!4v1723464187347!5m2!1sen!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="420"
                            height="437" style="border-radius: 25px"></iframe>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            function sortProducts() {
                var sortValue = $('#sort').val();

                var $products = $('#product-list .fruite-item');

                // Sort
                var $sortedProducts = $products.sort(function(a, b) {
                    var nameA = $(a).data('name').toLowerCase();
                    var nameB = $(b).data('name').toLowerCase();

                    if (sortValue === 'nama_barang') {
                        if (sortValue === 'asc') {
                            return nameA.localeCompare(nameB);
                        } else if (sortValue === 'desc') {
                            return nameB.localeCompare(nameA);
                        } else {
                            return 0;
                        }
                    }
                });

                $('#product-list').empty().append($sortedProducts);
            }

            $('#sort').on('change', sortProducts);
        });
    </script>
@endsection
