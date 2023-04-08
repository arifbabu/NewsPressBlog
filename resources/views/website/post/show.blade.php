@extends('master')





@section('content')





<table class="table table-bordered mt-">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Tag</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
          <td>
            @foreach ($item->categories as $cat)
            {{$cat->name}} ,
          @endforeach
        </td> 
          <td>
            @foreach ($item->tags as $tag)
              {{$tag->name}} ,
            @endforeach
        </td>
        <td>{!! Str::limit($item->description, 300) !!}</td>
        <td>
          <a href="{{route('post.readmore', $item->id)}}" class="btn btn-primary">Read</a>  
          <a href="{{route('post.edit', $item->id)}}" class="btn btn-success">Edit</a>  
          <a href="{{route('post.delete', $item->id)}}" class="btn btn-danger">Delete</a>  
        </td>


     <td>

      <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
   </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $data->links()}}

  <script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                // console.log(data.success)
                console.log("ok");
              }
          });
      })
    })
  </script>


@endsection

