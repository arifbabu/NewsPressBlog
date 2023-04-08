@extends('master')

@section('content')

    <h1>{{$post->name}}</h1> <hr>

    <label for="tagName"><h5 style="font-weight:bold; color: red; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Tag Name</h5></label>
    <p>
        @foreach ($post->tags as $tag)
            {{$tag->name}} ,
        @endforeach
    </p>  <hr>
    <label for="tagName"><h5 style="font-weight:bold; color: red; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Category Name</h5></label>
    <p>
        @foreach ($post->categories as $cat)
            {{$cat->name}} ,
        @endforeach
    </p>  <hr>
    <p>{!! $post->description !!}</p>

    <hr> 
    <hr>

    {{-- Comment Index Table for Specific Post --}}
    <h1 class="btn btn-success">Comment Index Section</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Post ID</th>
                        <th scope="col">Post Name</th>
                        <th scope="col">Post Description</th>
                        <th scope="col">User Comment</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{!! $post->description !!}</td>
                        {{-- <td>{{$post->id}}</td> --}}


                        
                        {{-- <td>{{$post->id}}</td> --}}
                        <td>
                            @foreach ($post->comments as $comm)
                            {{$comm->comment}} <br> <br>                 
                            @endforeach
                          </td>



                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


{{-- Comment Form for Specific Post --}}
    <hr> <hr>
    <h1 class="btn btn-info"> Please Comment Below! Thank You!!</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('comment.store', $post->id)}}"  method="POST">
                  @csrf
                    <div class="form-group">
                      <label for="nameInputEmail1">Please Write your Name</label>
                      <input type="text" class="form-control" name="name" id="nameInputEmail1" aria-describedby="nameHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Comment Here!!</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="Write your commmetn here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>




@endsection

