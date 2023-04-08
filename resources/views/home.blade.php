<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body>
    <h1 class="offset-5 mt-3 btn btn-primary">This is Home Page</h1>

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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>