<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blogs</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>

    <div class="bg-dark py-3">
    <div class="container">
     <h3  class="text-white">Edit Blogs </h3>
    </div>
    </div>

    <div class="container ">
    <div class="d-flex justify-content-between py-3">
    <div>
       <h4> Blogs</h4>
    </div>


    <div class="">
       <a href="{{route('blog.index')}}" class="btn btn-primary">Back </a>
     </div>

    </div>


    <form  action="{{route('blog.update', $editpost->id)}}" method="post">
        @csrf
        @method('put')
    <div class="card border-0 shadow-lg">
    <div class="card-body">


      <div class="mb-3">
        <label  for="title" class="form-label">Title</label>
        <input type="name" name="title"  class="form-control
         @error('title') is-invalid @enderror " value="{{old('title',$editpost->title)}}"  >

        @error('title')
        <p class="invalid-feedback"> {{ $message }}</p>
        @enderror
      </div>


        <div class="mb-3">
            <label for="blogs" class="form-label">Blogs</label>
            <textarea  name="blogs" rows="3"   class="form-control @error('blogs') is-invalid @enderror ">{{old('blogs',$editpost->blogs)}} </textarea>
            @error('blogs')
            <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
          </div>




          <div class="mb-3">
            <label  for="categories" class="form-label">Categories</label>
            <input type="name" name="categories"  class="form-control
             @error('categories') is-invalid @enderror " value="{{old('categories',$editpost->categories)}}"  >

            @error('categories')
            <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
          </div>

          <div class="mb-3">
            <label  for="comments" class="form-label">Comments</label>
            <textarea  name="comments" rows="3" class="form-control "> {{old('comments',$editpost->comments)}} </textarea>
          </div>

          <div class="mb-3">
            <label  for="replys"  class="form-label">Replys</label>
            <textarea  name="replys" class="form-control"  rows="3"> {{old('replys',$editpost->replys)}} </textarea>
          </div>
        


          <button  class="btn btn-success" >Update Blog</button>

    </div>
    </div>


    

</form>



    </div>
    
</body>
</html>