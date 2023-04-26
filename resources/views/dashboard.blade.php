<x-app-layout>
    <x-slot name="header">
       
        
    </x-slot>

    <div class="py-12">
   

<div class='container'><div class='row'>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>{{ $user->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

</div>



    </div>
</x-app-layout>
