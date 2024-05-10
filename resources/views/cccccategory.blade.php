@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
<div class="text-end my-2">
    <p class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add_category_modal">Add Catagory</p>
</div>
    <div class="container">
        <div class="row row-gap-3">
            @for($i=1; $i<20; $i++)
            <div class="col-md-6">
                <div class="single-category">
                    <h3 class="fw-bold">Category Name</h3>
                    <p class="m-0">Total Products: 12</p>
                </div>
            </div>
            @endfor
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>


     <!-- Modal Body -->
   
    <<div class="modal fade" id="add_catagory_modaladd_category_modal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    


<!-- Button to Open the Add Category Modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    Add Category
</button>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" method="POST" action="{{ route('add_category') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection













public function view(){
    $categories = Category::all();
    return view('category',compact('categories'));
}

public function store(Request $request){
    $category = new Category();
    // dd($request->all());
    $category->name = $request->name;
    $category->save();

    return redirect()->back()->with('message','category added successfully');    }