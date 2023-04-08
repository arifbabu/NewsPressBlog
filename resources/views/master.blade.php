<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    <title>Master Page</title>
  </head>
  <body>
    
    @include('sweetalert::alert')

    <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <a href="{{route('post.create')}}" class="btn btn-primary">Post Create Page</a>
              <a href="{{route('post.index')}}" class="btn btn-warning">Post Index Page</a>
              <a href="{{route('cat.trash.file')}}" class="btn btn-info">Category Trash Folder</a>
              <a href="{{route('post.trash.file')}}" class="btn btn-dark">Post Trash Folder</a>
              <a href="{{route('tag.trash.file')}}" class="btn btn-success">Tag Trash Folder</a>
              <a href="{{route('website.home')}}" class="btn btn-warning">Website Home Page</a>
              <a href="{{route('tag.index')}}" class="btn btn-info">Tag Index Page</a>
              <a href="{{route('tag.create')}}" class="btn btn-danger">Tag Create Page</a>
              <a href="{{route('cat.index')}}" class="btn btn-dark">Category Index Page</a>
              <a href="{{route('cat.create')}}" class="btn btn-danger">Category Create Page</a>
          </div>
      </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  </body>
</html>