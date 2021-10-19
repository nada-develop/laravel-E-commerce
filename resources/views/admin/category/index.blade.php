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
                     <div class="card-header">All Category</div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ( $cats as $cat )
                        <tr>
                            <th scope="row">{{ $cats->firstItem()+$loop->index }}</th>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ $cat->user->name }}</td>
                            <td>
                            @if ($cat->created_at == Null)
                            <span class="text-danger"> No Data Set</span>
                            @else
                            {{ $cat->created_at->diffForHumans()}}
                            @endif
                            </td>
                            <td>
                            <a href="{{ route('edit.cat', $cat->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{  route('delete.cat', $cat->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                       @endforeach



                    </tbody>
                  </table>
                {{ $cats->links() }}
             </div>

            </div>
            <div class="col-md-4">
                <div class="card">
                 <div class="card-header">Add Category</div>
                 <div class="card-body">
                 <form action="{{ route('store.category') }}" method="POST">
                    @csrf
                 <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name</label>
                    <input type="text"name="category_name" class="form-control" id="exampleFormControlInput1" placeholder="Category name">
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button class="btn btn-primary" type="submit">Add Category</button>
                </form>
            </div>
                </div>
            </div>
            </div>
        </div>

        {{-- trash part --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                     <div class="card-header">Trash List</div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ( $tarshCats as $cat )
                        <tr>
                            <th scope="row">{{ $cats->firstItem()+$loop->index }}</th>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ $cat->user->name }}</td>
                            <td>
                            @if ($cat->created_at == Null)
                            <span class="text-danger"> No Data Set</span>
                            @else
                            {{ $cat->created_at->diffForHumans()}}
                            @endif
                            </td>
                            <td>
                            <a href="{{ route('edit.cat', $cat->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('forceDelete.cat', $cat->id ) }}" class="btn btn-danger">Delete</a>
                            <a href="{{  route('restore.cat', $cat->id) }}" class="btn btn-info">Restore</a>
                            </td>
                          </tr>
                       @endforeach



                    </tbody>
                  </table>
                {{ $tarshCats->links() }}
             </div>

            </div>
            <div class="col-md-4">

            </div>
        </div>
        {{-- end trash --}}
    </div>
</x-app-layout>
