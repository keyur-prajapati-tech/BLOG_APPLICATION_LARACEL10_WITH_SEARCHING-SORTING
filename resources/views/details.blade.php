<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG DETAILS</title>

    <link rel="stylesheet" href="{{asset('BS/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">BLOG DETAIL <a href="{{route('blogs.index')}}" class="btn btn-danger float-end">BACK</a></h3>
                    </div>
                    <div class="card-body">
                        <h3>BLOG ID : <b style="color: navy">{{$blogs->id}}</b></h3>
                        <img class="mb-2" src="{{url('/uploads/'.$blogs->blog_image)}}" alt="{{$blogs->blog_name}}" style="width:100%;height:750px;padding:4px;border:3px solid #000;border-radius:5px">
                        <h3>BLOG NAME : <b style="color: navy">{{$blogs->blog_name}}</b></h3>
                        <h3>BLOG TYPE : <b style="color: navy">{{$blogs->blog_type}}</b></h3>
                        <h3>BLOG SHORT DESCRIPTION : <b style="color: navy">{{$blogs->blog_shortDesc}}</b></h3>
                        <h3>BLOG DESCRIPTION : <b style="color: navy">{{$blogs->blog_description}}</b></h3>
                        <h3>BLOG CREATOR : <b style="color: navy">{{$blogs->blog_creator}}</b></h3>
                        <h3>BLOG CDATE : <b style="color: navy">{{$blogs->blog_cdate}}</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>