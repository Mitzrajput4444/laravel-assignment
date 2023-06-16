<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
      h2{    
      margin: 50px 0;
      }
      .capital > th {
        text-transform: uppercase;
      }
    </style>
</head>
<body>
 <div class="container">
 <h2><a class="btn btn-success" href="{{route('product.create')}}">ADD</a></h2>
  @if ($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
 <div class="alert alert-primary" id="myMsg" role="alert">
 {{session('success')}}
</div>
@endif
@if(session('update'))
 <div class="alert alert-success" id="myMsg" role="alert">
 {{session('update')}}
</div>
@endif
@if(session('del'))
 <div class="alert alert-danger" id="myMsg" role="alert">
 {{session('del')}}
</div>
@endif
<table class="table table-striped">
  <thead>
    <tr class="capital">
      <th scope="col">Id</th>
      <th scope="col">ProductName</th>
      <th scope="col">description</th>
      <th scope="col">CateId</th>
      <th scope="col">Qty</th>
      <th scope="col">image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i=1;
    @endphp
      @foreach($products as $key)
      <tr> 
        <th scope="row">@php
        echo $i;
        $i++;
        @endphp</th>
        <td>{{$key->productName}}</td>
        <td>{{$key->description}}</td>
        <td>{{$key->cateId}}</td>
        <td>{{$key->qty}}</td>
        <td><img src="/images/{{$key->image}}" width="50px"/></td>
        <td>
          <a href="{{route('product.edit',$key->productId)}}" class="btn btn-primary">Update</a>
        </td>
        <td>
          <form action="{{route('product.destroy',$key->productId)}}" method="post">
            @csrf 
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">  
          </form>
        </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
 </div>
 <script>
  window.setTimeout("document.getElementById('myMsg').style.display='none'",3000);
 </script>
</body>
</html>