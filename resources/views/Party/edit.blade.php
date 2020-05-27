
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<form action="/party/{{$party->id}}/update" method="POST"enctype="multipart/form-data">
@csrf()
@method('PUT')
<div class="jumbotron"style="background-color:#ccebff;">
<div class="form-group">
      <h2><label for="Name">Update Party</label></h2>

  </div>
    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$party->name}}"placeholder=" Party Name ">
</div>
<div class="form-group">
      <label for="logo">Image</label>
      <input name="logo" type="file" class="form-control" id="logo" value="{{$party->logo}}">
     <img class="img-thumbnail" src="{{asset($party->logo)}}" width="250px" height="250px" >
       </div>

  <button href="" type="Submit" class="btn btn-primary">Update Party</button>
  </div>

</form>
</body>
</html>
