@extends('layouts.app')
@section('content')
<div class="jumbotron" style="background-color:#ccebff;">
<form >
<div class="row">
<div class="col-md-5">
<input class="form-control my-0 py-1 lime-border" name="name" type="text" placeholder="Candidate Name" aria-label="Search">
</div>
<div class="col-md-2">
<div class="input-group-append">
  <button type='submit' class='btn' style="margin-left:5px; background-color:grey;"><i class="fa fa-thumbs-o-up"></i></button>
  </div>
  </div>
</div>
</form>

<div>
<h2>candidates List</h2>
<td><a href="/candidate/create"><i class="fa fa-plus-square" aria-hidden="true"></i></a></td>
</div>

<div>
<table class="table table-dark">
<tr>
<th>Sl. No.</th>
<th>Name</th>
<th>Image</th>
<th>Adhaar No</th>
<th>Email Id</th>
<th>Party</th>
<th>District</th>
<th> Action</th>

</tr>
@foreach($candidates as $index => $candidate)
<tr>
<td>{{$index+$candidates->firstItem()}}</td>
<td>{{$candidate->name}}</td>
<td>
  @if($candidate->image)
   <img class="img-thumbnail" src="{{asset($candidate->image)}}" width="100px" height="auto" >
     @else
     No Image
     @endif
    </td>
<td>{{$candidate->adhaar_no}}</td>
<td>{{$candidate->email}}</td>
<td>{{$candidate->party->name}}
<td>{{$candidate->district->name}}</td>

<td><a href="/candidate/{{$candidate->id}}/show"><i class="fa fa-eye" style="color:#00ccff;" aria-hidden="true"></i>
</button></a></td>
 

<td><a href="/candidate/{{$candidate->id}}/edit"><i class="fa fa-pencil" style="color:lime;margin-right:20px;" aria-hidden="true"></i>
</button></a></td>

<td>
<form  action='/candidate/{{$candidate->id}}/delete' method='POST'>
@csrf()
@method('delete')
<button><i class="fa fa-trash" style="color:#ff3300;" aria-hidden="true"></i></button>
</form>
</td>

</tr>
@endforeach
</table>
</div>
{{$candidates->appends($_GET)->links()}}

</div>
@endsection