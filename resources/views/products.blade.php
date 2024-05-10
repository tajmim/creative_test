@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
<div class="text-end my-2">
    <p class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add_product_modal">Add Product</p>
</div>
    <div class="container">
        <div class="products mb-3">
            @for($p=1; $p < 6 ; $p++)
                <div class="__single">
                <div class="image">
                    <img class="w-100" src="https://www.bdshop.com/pub/media/catalog/product/cache/eaf695a7c2edd83636a0242f7ce59484/b/a/baseus_6-in-1_usb_c_hub.jpg" alt="">
                </div>
                <div>
                    <h2>Best Electronics update In 2024</h2>
                    <div>
                        <p class="fw-bold m-0">Categories:</p>
                        <div>
                            @for($i=0; $i < 4 ; $i++)
                                <span class="badge bg-info text-capitalize">category 1</span>
                            @endfor
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold m-0">Features:</p>
                        <ul>
                            @for($i=0; $i < 4 ; $i++)
                                <li class="text-capitalize">{{ 'feature'.$i }}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <nav aria-label="Page navigation example mt-2">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>


<!-- Add Product Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">category</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">feature</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">image</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>

                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
