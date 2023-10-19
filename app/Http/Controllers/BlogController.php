<?php

namespace App\Http\Controllers;

//include 
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    //
    public function index(){

        $postlist=Blog::orderby('id','ASC')->get();     //->paginate(5)
        return view('blogs.list',['blogs'=> $postlist]);

    }
    public function create(){
        return view('blogs.create');
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'blogs'=>'required',
            'categories' =>'required'
        ]);

        if($validator->passes()){
            //save data  insert a record in db
            $blogpost= new Blog();
            $blogpost->title = $request->title;
            $blogpost->blogs = $request->blogs;
            $blogpost->categories = $request->categories;
            $blogpost->comments= $request->comments;
            $blogpost->replys = $request->replys;
           
            $blogpost->save();

            $request->session()->flash('success','Add Blog Successfully!');

            return redirect()->route('blog.index');

        }
        else{
            //return with errors
            return redirect()->route('blog.create')->withErrors($validator)->withInput();
        }




    }


public function edit($id){
    $editpost= Blog::findorFail($id);
    return view('blogs.edit',['editpost'=> $editpost]);
}


public function update($id ,Request $request){
    //validation rules check
    $validator=Validator::make($request->all(),[
        'blogs'=>'required',
        'categories' =>'required'
    ]);

    if($validator->passes()){
        //save data  insert a record in db
        $blogpost  =  Blog::find($id) ;  //find then update
        $blogpost->title = $request->title;
        $blogpost->blogs = $request->blogs;
        $blogpost->categories = $request->categories;
        $blogpost->comments=$request->comments;
        $blogpost->replys=$request->replys;
       
        $blogpost->save();

        $request->session()->flash('success','Update Blog Successfully!');

        return redirect()->route('blog.index');

    }
    else{
        //return with errors
        return redirect()->route('blog.edit', $id)->withErrors($validator)->withInput();
    }
    
}

public function destroy($id, Request $request){
    $blogpost=Blog::findorFail($id);
    $blogpost->delete();
    $request->session()->flash('success','Delete Blog Successfully!');

    return redirect()->route('blog.index');

}



//if code find or fail no need this below code 
// if(!$editpost){
//     abort('404');

// }

//dd($editpost);   //dump and die so it will stop the execution of script





}
