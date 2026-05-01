@include('subview.header')  
<!-- included subview -->


<h1>Hi, Its home page</h1>
<a href = "/">Welcome Page<a>

<!-- subview section -->
 <h1> Home Page</h1>

 @include('subview.inner', ["page"=> "this is home page"])  
 passing data via subview