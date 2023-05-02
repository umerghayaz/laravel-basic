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
Edit Brand
</div>
<div class='card-body'>
<form action="{{ url('brand/update/'.$brands->id)  }}"  enctype="multipart/form-data" method='POST'>
    <input type="hidden" name='old_image'  value="{{ $brands->brand_image }}">

    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Category</label>
    <input type="text" name='brand_name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
    @error('brand_name')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Category</label>
    <input type="file" name='brand_image' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
    @error('brand_image')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>
  <div class="form-group">
    <img src="{{asset($brands->brand_image)}}" >
  </div>
  <button type="submit" class="btn btn-primary">Update a Brand</button>
</form></div>
    </div>
</div>
</div>

</div>


    </div>
</x-app-layout>
