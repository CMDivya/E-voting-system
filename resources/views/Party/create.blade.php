<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form action="/party/store" method="POST" enctype="multipart/form-data">
@csrf()

<div class="jumbotron"style="background-color:#ccebff;">
<div class="form-group" >
      <h2><label for="Name">Create Party</label></h2>
      </div>
    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Party Name">
</div>
@error('name')
<div class="alert alert-danger"> {{ $message }}</div>
@enderror
<div>

<div class="form-group">
    <label for="logo">Photo</label>
  </div>
  <div class="form-group">
  <input name="logo" type="file" class="form-control" id="logo">
  </div>

  <button type="Submit" class="btn btn-primary">Add Party</button>
  </div>
</form>
</body>
</html>