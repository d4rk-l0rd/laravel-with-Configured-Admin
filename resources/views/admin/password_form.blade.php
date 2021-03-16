@extends('admin.layouts.template')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Change Password</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 25px;">
                <div class="row">
                    @if(Session::has('flash_message'))
                        <div class="col-md-12" id="flash_message">
                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                        </div>
                    @endif
                    @if(Session::has('error_message'))
                        <div class="col-md-12" id="flash_message">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('error_message') !!}</em></div>
                        </div>
                    @endif
                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            <div class="card-title">Change Password</div>
                        </div>
                        <div class="card-body">
                            @if(count($errors))
                                <div class="col-md-12">
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="form-group">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    {{$error}}
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <form method="post" style="width: 100%">
                                @csrf
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 custom_padding_7">
                                                    <div class="form-group col-md-12  flex-row"
                                                         style="display: flex">
                                                        <div class="col-md-4">
                                                            <label for="exampleInputPassword1">Old Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control"
                                                                   id="exampleInputPassword1" name="old"
                                                                   placeholder="Old Password"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12  flex-row"
                                                         style="display: flex">
                                                        <div class="col-md-4">
                                                            <label for="exampleInputPassword1">New Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control"
                                                                   id="exampleInputPassword1" name="new"
                                                                   placeholder="New Password"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12  flex-row"
                                                         style="display: flex">
                                                        <div class="col-md-4">
                                                            <label for="exampleInputPassword1">Confirm Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control" name="confirm"
                                                                   id="exampleInputPassword1"
                                                                   placeholder="Confirm Password"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="justify-content: center; margin: 10px;">
                                                        <div>
                                                            <button type="submit" class="btn btn-primary">Change
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- ./card-body -->

                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @include('admin.layouts.footer')
    </div>
@endsection
