<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD NEW BLOG</title>

    <link rel="stylesheet" href="{{asset('BS/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">ADD NEW BLOG <a href="{{route('blogs.index')}}" class="btn btn-danger float-end">BACK</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG NAME</label>
                                <input type="text" name="blog_name" class="form-control @error ('blog_name') is-invalid @enderror" value="{{old('blog_name')}}" placeholder="Enter Blog Name">
                                @error('blog_name')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG TYPE</label>
                                <input type="text" name="blog_type" class="form-control @error ('blog_type') is-invalid @enderror" value="{{old('blog_type')}}" placeholder="Enter Blog Type" />
                                @error('blog_type')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG SHORT DESCRIPTION</label>
                                <textarea name="blog_shortDesc" class="form-control" cols="7" rows="5" placeholder="Enter Blog Short Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG DESCRIPTION</label>
                                <textarea name="blog_description" class="form-control" cols="10" rows="10" placeholder="Enter Blog Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">UPLOAD BLOG IMAGE</label>
                                <input type="file" name="blog_image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG CREATOR</label>
                                <input type="text" name="blog_creator" class="form-control @error ('blog_type') is-invalid @enderror" value="{{old('blog_creator')}}" placeholder="Enter Blog Creatore">
                                @error('blog_creator')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">ENTER BLOG CREATED DATE</label>
                                <input type="date" name="blog_cdate" class="form-control @error ('blog_cdate') is-invalid @enderror" value="{{old('blog_cdate')}}" placeholder="Enter Blog CDate">
                                @error('blog_cdate')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                            </div>
                            <button class="btn btn-primary">SAVE BLOG</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>