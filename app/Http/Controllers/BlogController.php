<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::orderBy('created_at','DESC')->get();

        $blogtype = Blog::select('blog_type')->distinct()->get();

        return view('list',compact('blogs','blogtype'));
    }

    public function filterblog($type){
        $blogs = Blog::orderBy('created_at','DESC')->where('blog_type',$type)->get();
        $blogtype = Blog::select('blog_type')->distinct()->get();

        return view('list',compact('blogs','blogtype'));
    }

    public function searchblogname(Request $request){
        $search_data = $request->input('search_input');
        
        $search_record = Blog::orderBy('created_at','DESC')->where('blog_name','like','%'.$search_data.'%')->get();

        return view('search',['search_record'=>$search_record]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'blog_name' => 'required',
            'blog_type' => 'required',
            'blog_image' => 'sometimes|image:gif,png,jpg,jpeg',
            'blog_creator' => 'required',
            'blog_cdate' => 'required'
        ]);
        
        if($validator->passes()){
            $blog = new Blog();
            $blog->blog_name = $request->blog_name;
            $blog->blog_type  = $request->blog_type;
            $blog->blog_shortDesc = $request->blog_shortDesc;
            $blog->blog_description = $request->blog_description;
            $blog->blog_creator = $request->blog_creator;
            $blog->blog_cdate = $request->blog_cdate;
            
            if($request->blog_image){
                $ext = $request->blog_image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->blog_image->move(public_path()."/uploads/",$newFileName);
                $blog->blog_image = $newFileName;
            }
            $blog->save();

            return redirect()->route('blogs.index')->with('success','Blog Added Successfully...!');
        }else{
            return redirect()->route('blogs.create')->withErrors($validator)->withInput();
        }
    }

    public function show($id){
        $blogs = Blog::findOrFail($id);

        return view('details',['blogs'=>$blogs]);
    }

    public function edit($id){
        $blogs = Blog::findOrFail($id);

        return view('edit',['blogs'=>$blogs]);
    }

    public function update($id, Request $request){
        $blog = Blog::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'blog_name' => 'required',
            'blog_type' => 'required',
            'blog_image' => 'sometimes|image:gif,png,jpg,jpeg',
            'blog_creator' => 'required',
            'blog_cdate' => 'required'
        ]);
        
        if($validator->passes()){
            $blog->blog_name = $request->blog_name;
            $blog->blog_type  = $request->blog_type;
            $blog->blog_shortDesc = $request->blog_shortDesc;
            $blog->blog_description = $request->blog_description;
            $blog->blog_creator = $request->blog_creator;
            $blog->blog_cdate = $request->blog_cdate;
            
            if($request->blog_image){
                $old_image = $blog->blog_image;
                
                $ext = $request->blog_image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->blog_image->move(public_path()."/uploads/",$newFileName);
                $blog->blog_image = $newFileName;

                File::delete(public_path().'/uploads/'.$old_image);
            }
            $blog->save();

            return redirect()->route('blogs.index')->with('success','Blog Updated Successfully...!');
        }else{
            return redirect()->route('blogs.edit')->withErrors($validator)->withInput();
        }
    }

    public function destory($id){
        $blogs = Blog::findOrFail($id);

        File::delete(public_path().'/uploads/'.$blogs->blog_image);
        $blogs->delete();

        return redirect()->route('blogs.index')->with('success','Blog Deleted Successfully...!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query
        $blogs = Blog::where('blog_name', 'LIKE', "%".$query."%")
            ->orderBy('created_at', 'DESC')
            ->get();

        $blogtype = Blog::select('blog_type')->distinct()->get(); // To maintain the filter list

        return view('list', compact('blogs', 'blogtype'));
    }
}
