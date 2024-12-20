<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH BLOG</title>

    <link rel="stylesheet" href="{{asset('BS/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">SEARCH BY BLOG_NAME <a href="{{route('blogs.index')}}" class="btn btn-danger float-end">BACK</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blogs.searchblog')}}" method="get">
                            @csrf
                            <div class="card" style="border:3px solid #000">
                                <div class="card-body d-flex p-2 gap-2">
                                    <input type="text" name="search_input" class="form-control" placeholder="SEARCH HERE...!" value="{{ request('search_input') }}">
                                    <button type="submit" class="btn btn-success">SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="mt-2 mb-2">
            @foreach($search_record as $blog)
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