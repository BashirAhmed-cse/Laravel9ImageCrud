<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <h1 class="text-center my-2 p-4 text-success">Laravel 9 Image Crud</h1>
            <div class="card">
                <div class="card-body">
                    <a type="button" class="btn btn-primary my-2" href="{{route('add.product')}}">Add Product</a>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$item)
                      <tr>
                       
                        <th scope="row">{{++$key}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img style="height: 50px; width:50px;" src="{{asset('image/products/'.$item->image)}}">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('edit.product',$item->id)}}">Edit</a>
                            <a class="btn btn-danger">Delete</a>
                        </td> 
                       
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
