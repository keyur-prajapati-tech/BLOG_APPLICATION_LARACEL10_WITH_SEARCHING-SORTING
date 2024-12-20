<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>

    <link rel="stylesheet" href="{{asset('BS/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="card bg-dark">
        <h1 class="text-white text-center mt-2 p-0">BLOG APPLICATION WITH SEARCHING AND SORTING USING LARAVEL</h1>
    </div>
    <div class="container-fulid mb-3">
        <div class="row p-3">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{session::get('success')}}
                </div>
            @endif

            <!-- FILTER BLOG WITH BLOG_TYPE -->
            <ul class="list-group list-group-horizontal bg-light">
                <li>
                    <a href="{{route('blogs.index')}}" class="list-group-item" style="margin-left:15px">ALL</a>
                </li>
                @foreach($blogtype as $row)
                <li class="list-group-item">
                    <a href="{{url('blog_type/'.$row->blog_type)}}">{{$row->blog_type}}</a>
                </li>
                @endforeach
            </ul>

            <!-- SEARCH BLOG BY IT'S NAME -->
            <hr class="mt-2 mb-2">
            <form action="{{ route('blogs.search') }}" method="GET">
                <div class="d-flex gap-2 p-2" style="border:3px solid #000;border-radius:5px;">
                    <!-- <input type="text" name="query" class="form-control" placeholder="Search by blog name..." value="{{ request('query') }}"> -->
                    <input type="text" name="query" class="form-control" placeholder="Search by blog name...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <hr class="mt-2 mb-2">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">DETAIL LIST OF BLOG <a href="{{route('blogs.create')}}" class="btn btn-primary float-end">ADD BLOG</a></h3>
                    </div>
                </div>
            </div>
            <hr class="mt-2">
            <a href="{{route('blogs.searchblog')}}" class="p-2 text-center" style="font-weight:800;margin:3px 15px;border:3px solid #000;border-radius:5px;width:250px;">SEARCH BLOG PAGE</a>
            <hr class="mt-2">
            @foreach($blogs as $blog)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card">
                        <img src="{{url('/uploads/'.$blog->blog_image)}}" alt="{{$blog->blog_image}}" class="card-img-top p-2" style="width:100%;height:350px;object-fit:contain">
                        <div class="card-body">
                            <h5 class="card-title">BLOG NAME : <b style="color:navy">{{$blog->blog_name}}</b></h5>
                            <h5 class="card-title">BLOG TYPE : <b style="color:navy">{{$blog->blog_type}}</b></h5>
                            <div class="card p-2" style="border:3px solid #000">
                                <h5 class="card-title">BLOG DESCRIPTION : <b style="color:navy">{{$blog->blog_description}}</b></h5>
                                <h5 class="card-title">BLOG CREATOR : <b style="color:navy">{{$blog->blog_creator}}</b></h5>
                                <h5 class="card-title">BLOG CDATE : <b style="color:navy">{{$blog->blog_cdate}}</b></h5>
                            </div>
                            <div class="mt-2 d-flex items-center" style="justify-content: space-between">
                                <a href="{{route('blogs.show',$blog->id)}}"><button class="btn btn-dark">DETAILS</button></a>
                                <div class="">
                                    <a href="{{route('blogs.edit',$blog->id)}}"><button class="btn btn-warning">EDIT</button></a>
                                    <a href="{{route('blogs.destory',$blog->id)}}"><button class="btn btn-danger">DELETE</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>