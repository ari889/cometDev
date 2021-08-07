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
                    <div class="col-lg-12">
                        @include('validate')
                        <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">Add new post</a>
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All posts (Published)</h4>
                                <a href="{{ route('post.index') }}" class="badge badge-primary mt-3">Published {{ ($published == 0 ? '' : $published) }}</a>
                                <a href="{{ route('post.trash') }}" class="badge badge-danger mt-3">Trash {{ ($trash == 0 ? '' : $trash) }}</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Name</th>
                                            <th>Post Type</th>
                                            <th>Post Catrgory</th>
                                            <th>Post Tag</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_data as $data)
                                            @php
                                            $featured_data = json_decode($data->featured);
                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>{{$featured_data -> post_type}}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$data->created_at -> diffForHumans()}}</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" status_id="{{$data->id}}" value="active" id="cat_status_{{$loop->index+1}}" class="check cat_check" {{($data->status == true ? 'checked=""' : '')}}>
                                                        <label for="cat_status_{{$loop->index+1}}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>

                                                    <div class="btn-group">
                                                        {{--                                                    <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>--}}
                                                        <a href="#" class="btn btn-warning" id="edit_cat" edit_id="{{$data->id}}"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('post.trash.update', $data->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <div class="modal fade" id="add-tag-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add new tag</h2>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tag.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-2" value="Add new">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-category-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit category</h2>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.update', 1)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control">
                            <input type="hidden" name="edit_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-2" value="Add new">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
