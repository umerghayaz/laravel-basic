<x-app-layout>
    <x-slot name="header">


    </x-slot>

    <div class="py-12">


<div class='container'><div class='row'>
    <div class='col-md-8'>
        <div class='card-header'>All Category


<table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{ $categories->firstItem()+$loop->index}}</th>
      <td>{{ $category->category_name}}</td>
      <td>{{ $category->user->name}}</td>
      @if($category->created_at==NULL)
      <span class="text-danger">NO DATA SET</span>
      @else
      <td>{{ $category->created_at->diffForHumans()}}</td>
      <td>
        <button class="btn-btn-info"><a href="{{ url('category/edit/'.$category->id) }}" >Edit</a></button>
        <button> <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn-btn-danger">Soft Delete</a></button>

      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
{{$categories->links()}}
</div>

</div>
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
All Category
</div>
<div class='card-body'>
<form action="{{ route('store.category') }}" method='POST'>
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Category</label>
    <input type="text" name='category_name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('category_name')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add a Category</button>
</form></div>
    </div>
</div>
</div>

</div>

<div class='container'><div class='row'>
    <div class='col-md-8'>
        <div class='card-header'>All Category


<table class="table">
  <thead>
    <tr>
      <th scope="col">SL NO</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($trachCat as $category)
    <tr>
      <th scope="row">{{ $categories->firstItem()+$loop->index}}</th>
      <td>{{ $category->category_name}}</td>
      <td>{{ $category->user->name}}</td>
      @if($category->created_at==NULL)
      <span class="text-danger">NO DATA SET</span>
      @else
      <td>{{ $category->created_at->diffForHumans()}}</td>
      <td>
        <button class="btn-btn-info"><a href="{{ url('category/restore/'.$category->id) }}" >Restore</a></button>
        <button> <a href="{{ url('category/fdelete/'.$category->id) }}" class="btn-btn-danger">Permanent Delete</a></button>

      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
{{$trachCat->links()}}
</div>

</div>
{{-- <div class='col-md-4'>
    <div class='card'>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
@endif --}}
{{-- <div class='card-header'>
All Category
</div> --}}
{{-- <div class='card-body'>
<form action="{{ route('store.category') }}" method='POST'>
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Category</label>
    <input type="text" name='category_name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('category_name')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Add a Category</button>
</form></div> --}}
    </div>
</div>
</div>

</div>
    </div>
</x-app-layout>
