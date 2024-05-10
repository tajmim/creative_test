@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="text-end my-2">
        @if (auth()->user()->user_type == 'admin' || (auth()->user()->user_type == 'vendor'))
            <p class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add_product_modal">Add Product</p>
        @endif

    </div>
    <div class="container">
        <div class="products mb-3">
            @foreach ($products as $product)
                <div class="__single">
                    <div class="image">
                        @if ($product->image)
                            <img src='{{ $product->image }}' alt="" width="80">
                        @else
                            <img src='https://ui-avatars.com/api/?background=random&color=fff&name={{ $product->name }}'
                                alt="" width="80">
                        @endif
                    </div>
                    <div>
                        <h2>{{ $product->name }}</h2>
                        <div>
                            <p class="fw-bold m-0">Categories:</p>
                            <div>
                                @foreach ($product->categories as $category)
                                    <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                                @endforeach

                            </div>
                        </div>
                        <div>
                            <p class="fw-bold m-0">Features:</p>
                            <ul>
                                @foreach ($product->features as $feature)
                                    <li class="text-capitalize">{{ $feature->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links('pagination::bootstrap-4') }}
        </div>


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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="name" required>
                        </div>

                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category</label>
                            <Select id="category_name" class="form-control select2" name="category_id[]" multiple>
                                <option> Select Categories </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </Select>
                        </div>
                        <div class="mb-3">
                            <label for="feature_name" class="form-label">Feature</label>
                            <Select id="feature_name" class="form-control select2" name="feature_id[]" multiple>
                                <option> Select Features </option>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->id }}"> {{ $feature->name }} </option>
                                @endforeach
                            </Select>
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">image</label>
                            <input type="file" class="form-control" id="product_name" name="image">
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
