@extends('admin.layouts.app')

@section('main-section')
    <!-- Main Wrapper -->
    <div class="main-wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.menu')

    <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{Auth::user() -> name}}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Posts</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12 d-flex">
                        @include('validate')
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Add new post</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post format</label>
                                        <div class="col-lg-9">
                                            <select name="post_type" id="post_format" class="form-control">
                                                <option>--SELECT--</option>
                                                <option value="Image">Image</option>
                                                <option value="Gallery">Gallery</option>
                                                <option value="Video">Video</option>
                                                <option value="Audio">Audio</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Category</label>
                                        <div class="col-md-9">
                                            @foreach($all_cat as $cat)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="cat[]" value="{{$cat->id}}"> {{$cat->name}}
                                                </label>
                                            </div>
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tags</label>
                                        <div class="col-lg-9">
                                            <select name="tag[]" id="" class="post-tag-select form-control" multiple="multiple">
                                                @foreach($all_tag as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="post_image">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post Image</label>
                                            <div class="col-lg-9">
                                                <img src="" class="post-img-load img-fluid" alt="">
                                                <label for="feature-image"><img src="{{asset('admin/assets/img/img.png')}}" alt="" style="width: 100px;height: 100px;cursor: pointer;"></label>
                                                <input name="image" type="file" id="feature-image" class="d-none">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_gallery">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post gallery image</label>
                                            <div class="col-lg-9">
                                                <div class="post-gallery-img"></div>
                                                <img src="" class="post-img-load-g img-fluid" alt="">
                                                <label for="gallery-image"><img src="{{asset('admin/assets/img/img.png')}}" alt="" style="width: 100px;height: 100px;cursor: pointer;"></label>
                                                <input name="post_gall[]" type="file" id="gallery-image" class="d-none" multiple>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_video">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post video link</label>
                                            <div class="col-lg-9">
                                                <input name="video" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="post_audio">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post audio link</label>
                                            <div class="col-lg-9">
                                                <input name="audio" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Content</label>
                                        <div class="col-lg-9">
                                            <textarea name="content" cols="30" rows="10" id="post_editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection
