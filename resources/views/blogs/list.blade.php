<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Page Blogs</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>

    <div class="bg-dark py-3">
    <div class="container">
     <h3  class="text-white">Laravel  Crud Operartions </h3>
    </div>
    </div>

    <div class="container ">
    <div class="d-flex justify-content-between py-3">
    <div>
       <h4> Blogs</h4>
    </div>


    <div class="">
       <a href="{{route('blog.create')}}" class="btn btn-primary">Create </a>
     </div>

    </div>

    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
        
    @endif

    <div class="card border-0 shadow-lg">
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Blogs</th>
                <th scope="col">Categories</th>
                <th scope="col">Comments</th>
             
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($blogs->isNOtEmpty())
              @foreach ( $blogs as $value )
              <!--<div class="card">
                <h5 class="card-header">{{$value->categories}}</h5>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text">{{$value->blogs}}</p>
                  <a href="#" class="btn btn-primary">{{$value->categories}}</a>
                </div>
              </div>-->
              <tr>
                
                <td>{{$value->id}}</td>
                <td>{{$value->title}}</td>
                <td>{{$value->blogs}}</td>
                <td>{{$value->categories}}</td>
                <td>{{$value->comments}}</td>
                <td class="d-flex "> <a href="{{route('blog.edit', $value->id)}}" class="btn btn-sm btn-success  ">Edit </a>
                    &nbsp; <a href="#" onclick="deleteblog({{ $value->id}})" class=" btn btn-sm btn-danger">Delete </a> 
                <form id="value-edit-action-{{$value->id}}"  action="{{route('blog.destroy',$value->id)}}" method="post" >
                  @csrf 
                  @method('delete')
                </form>
                
                  </td>
                
              </tr>
                
              @endforeach
                
             
             
              
              @else
              <tr>
                <th colspan="6">Record Not Found</th>
              </tr>
             
              @endif
            </tbody>
          </table>

    </div>


    </div>



    </div>
    
</body>
</html>

<script>
  function deleteblog(id){
    if(confirm('are u want to delete?')){
      document.getElementById('value-edit-action-' +id).submit();

    }

  }

  </script>