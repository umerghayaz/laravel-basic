<x-app-layout>
    <x-slot name="header">


    </x-slot>

    <div class="py-12">



<div class='col-md-4'>
    <div class='card'>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
@endif
<div class='card-header'>
Edit Category
</div>
<div class='card-body'>
<form action="{{ url('category/update/'.$categories->id) }}" method='POST'>
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Category</label>
    <input type="text" name='category_name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->category_name }}">
    @error('category_name')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Update a Category</button>
</form></div>
    </div>
</div>
</div>

</div>


    </div>
</x-app-layout>
