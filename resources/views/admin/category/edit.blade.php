<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <br>
             {{ __('AllCategory') }}
            <b style="float:right">

            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                 <div class="card-header">Edit Category</div>
                 <div class="card-body">
                 <form action="{{ route('update.category', $categories->id) }}" method="post">
                    @csrf
                 <div class="form-group">
                    <label for="exampleFormControlInput1"> Update Category Name</label>
                    <input type="text"name="category_name" class="form-control" id="exampleFormControlInput1" placeholder="Category name" value="{{ $categories->category_name }}">
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button class="btn btn-primary" type="submit">Update Category</button>
                </form>
            </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
