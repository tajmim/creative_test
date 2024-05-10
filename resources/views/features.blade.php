@extends('layouts.admin', ['title' => 'Features'])

@section('mainContent')
    <div class="text-end my-2">
        @if (auth()->user()->user_type == 'admin')
            <p class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add_category_modal">Add Feature</p>
        @endif

    </div>
    <div class="container">
        <div class="row row-gap-3">
            @foreach ($features as $feature)
                <div class="col-md-6">
                    <div class="single-category">
                        <h5 class="fw-bold">Feature Name : <span style="color: green">{{ $feature->name }}</span></h5>
                        <p class="m-0">Total Products: {{ $feature->products_count }}</p>
                    </div>
                </div>
            @endforeach
            {{ $features->links('pagination::bootstrap-4') }}
        </div>
    </div>


    <div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Feature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('features.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Feature Name</label>
                            <input type="text" class="form-control" id="category_name" name="name"
                                placeholder="Enter feature name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Feature</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
