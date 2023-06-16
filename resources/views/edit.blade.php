<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
  <h2>Update Your Data</h2>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 @if(session('success'))
 <div class="alert alert-primary" role="alert">
 {{session('success')}}
</div>

 @endif 
<form method="post" action="{{route('product.update',$p->productId)}}" enctype="multipart/form-data">
@csrf
@method('PATCH')
  <div class="form-group">
    <label for="exampleInputEmail1">Productname</label>
    <input type="text" name="pname" value="{{$p->productName}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter productname">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">cateId</label>
    <input type="number" name="cateId" class="form-control" value="{{$p->cateId}}" id="exampleInputPassword1" placeholder="Enter price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">description</label>
    <input type="number" name="des" class="form-control" value="{{$p->description}}" id="exampleInputPassword1" placeholder="Enter price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">qty</label>
    <input type="number" name="qty" class="form-control" value="{{$p->qty}}" id="exampleInputPassword1" placeholder="Enter price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <td><img src="/images/{{$p->image}}" width="50px"/></td>
    <input type="file" name="img" class="form-control" id="exampleInputPassword1" placeholder="Choose Image">
    <input type="hidden" name="hiddenimg" class="form-control" value="{{$p->image}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>