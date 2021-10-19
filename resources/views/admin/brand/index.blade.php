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
                        @if (session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                     <div class="card-header">All Brand</div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ( $brands as $brand )
                        <tr>
                            <th scope="row">{{ $drands->firstItem()+$loop->index }}</th>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="" alt=""></td>
                            <td>
                            @if ($brand->created_at == Null)
                            <span class="text-danger"> No Data Set</span>
                            @else
                            {{ $brand->created_at->diffForHumans()}}
                            @endif
                            </td>
                            <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                       @endforeach



                    </tbody>
                  </table>
                {{ $brands->links() }}
             </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                 <div class="card-header">Add Brand</div>
                 <div class="card-body">
                 <form action="" method="POST">
                    @csrf
                 <div class="form-group">
                    <label for="exampleFormControlInput1">Brand Name</label>
                    <input type="text"name="brand_name" class="form-control" id="exampleFormControlInput1" placeholder="Category name">
                    @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Brand Image</label>
                    <input type="file"name="brand_image" class="form-control" id="exampleFormControlInput1" placeholder="Category name">
                    @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button class="btn btn-primary" type="submit">Add Brand</button>
                </form>
            </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
