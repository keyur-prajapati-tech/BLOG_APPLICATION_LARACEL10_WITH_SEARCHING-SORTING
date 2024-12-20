<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT BLOG</title>

    <link rel="stylesheet" href="{{asset('BS/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">EDIT BLOG <a href="{{route('blogs.index')}}" class="btn btn-danger float-end">BACK</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blogs.update',$blogs->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG NAME</label>
                                <input type="text" name="blog_name" class="form-control" value="{{$blogs->blog_name}}" placeholder="Enter Blog Name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG TYPE</label>
                                <input type="text" name="blog_type" class="form-control" value="{{$blogs->blog_type}}" placeholder="Enter Blog Type" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG SHORT DESCRIPTION</label>
                                <textarea name="blog_shortDesc" class="form-control" cols="7" rows="5" placeholder="Enter Blog Short Description">{{$blogs->blog_shortDesc}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG DESCRIPTION</label>
                                <textarea name="blog_description" class="form-control" cols="10" rows="10" placeholder="Enter Blog Description">{{$blogs->blog_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">UPLOAD BLOG IMAGE</label>
                                <input type="file" name="blog_image" class="form-control">
                                <input type="text" name="old_image" class="form-control" value="{{$blogs->blog_image}}">
                                <img src="{{url('/uploads/'.$blogs->blog_image)}}" alt="{{$blogs->blog_name}}" width="105px" height="105px">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG CREATOR</label>
                                <input type="text" name="blog_creator" class="form-control" value="{{$blogs->blog_creator}}" placeholder="Enter Blog Creatore">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG CREATED DATE</label>
                                <input type="date" name="blog_cdate" class="form-control" value="{{$blogs->blog_cdate}}" placeholder="Enter Blog CDate">
                            </div>
                            <button class="btn btn-warning">EDIT BLOG</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>