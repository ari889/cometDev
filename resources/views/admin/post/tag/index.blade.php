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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-primary btn-sm">Add new post</a>
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post title</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>This is a demo title</td>
                                            <td>Category 1</td>
                                            <td>php laravel</td>
                                            <td>20/10/1996</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-info">View</a>
                                                    <a href="#" class="btn btn-warning">Edit</a>
                                                    <a href="#" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
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
@endsection
