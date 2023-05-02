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
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Image</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach($brands as $brand)
                  <tr>
                    <th scope="row">{{ $brands->firstItem()+$loop->index}}</th>
                    <td>{{ $brand->brand_name}}</td>
                    <td><img src="{{asset($brand->brand_image)}}" style="width:76px;height:46px;"></td>
                    @if($brand->created_at==NULL)
                    <span class="text-danger">NO DATA SET</span>
                    @else
                    <td>{{ $brand->created_at->diffForHumans()}}</td>
                    <td>
                      <button class="btn-btn-info"><a href="{{ url('brand/edit/'.$brand->id) }}" >Edit</a></button>
                      <button> <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn-btn-danger">Delete</a></button>

                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
{{$brands->links()}}
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
<form action="{{ route('store.brand') }}" method='POST'  enctype="multipart/form-data" method='POST'>
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Brand_name</label>
    <input type="text" name='brand_name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('brand_name')
    <span class='text-danger'>{{ $message}}</span>
    @enderror
  </div>




        @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Select Image</label>
        <input type="file" name='brand_image' class="form-control" id="brand_image" aria-describedby="emailHelp">
        @error('brand_image')
        <span class='text-danger'>{{ $message}}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Add a Brand</button>

    </div>
</div>
</div>

</div>


    </div>
</div>
</div>

</div>
    </div>
</x-app-layout>
