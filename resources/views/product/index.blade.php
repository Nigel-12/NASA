@include('partials.header')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <img src="logo.png" alt="NASA" style="width:200px;height:50px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Tables
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/">Customer Table</a>
          <a class="dropdown-item" href="/P">Products Table</a>
        </div>
      <li class="nav-item active">
        <a class="nav-link" href="/addProduct">Add Product</a>
      </li>
      <li class="text-end">
    

  </div>
    <class="nav-item" style="float: right">
        <a class="nav-link" href="/logout" style="background-color:#E5E4E2" >Logout</a>

</nav>  

<div>
  <h1><style"">PRODUCT INFORMATION:</h1>
</div>
<table class="table table-bordered">
<thead>
    <tr>
      
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stocks</th>
      <th></th>
    </tr>
  </thead>
  @foreach ($products as $product)
  <tbody>
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->productName}}</td>
      <td>{{$product->productPrice}}</td>
      <td>{{$product->productQuantity}}</td>
      <td><a href="edit/{{$product->id}}"><button type="button" class="btn btn-light">Edit</button></a></td>
      <td><a href="delete/{{$product->id}}"><button type="submit" class="btn btn-danger">Delete</button></a></td>
    </tr>
  </tbody>
  @endforeach
</table>
@include('partials.footer')