@extends('layouts.master')

@section('title')
    Change Password | MLM
@endsection

@section('css_design')
    <style>
        @media (max-width: 575.98px) {
            h1 {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('nav')
    @if( session('data')['role'] == 'admin' )
    <li>
        <a href="/admin-manual?page=1&batch=1">
            <i class="now-ui-icons design_vector"></i>
            <p>Manual Binary</p>
        </a>
    </li>
    <li>
        <a href="/admin-universal?page=1">
            <i class="now-ui-icons design_vector"></i>
            <p>Universal Binary</p>
        </a>
    </li>
    <li>
        <a href="/add-refcode">
            <i class="now-ui-icons ui-1_email-85"></i>
            <p>Add Referral Code</p>
        </a>
    </li>
    <li>
        <a href="/view-refcode?sort=0&page=1">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>View Referral Code</p>
        </a>
    </li>
    @else
    <li>
        <a href="/client-dashboard">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li>
        <a href="/client-manual">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>Manual Binary</p>
        </a>
    </li>
    <li>
        <a href="/client-universal">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>Universal Binary</p>
        </a>
    </li>
    @endif


    <li>
        <a href="/use-refcode/head">
            <i class="now-ui-icons business_badge"></i>
            <p>Add Head</p>
        </a>
    </li>
    <li>
        <a href="/use-refcode/member">
            <i class="now-ui-icons business_badge"></i>
            <p>Add Member</p>
        </a>
    </li>
@endsection

@section('content')

    <div class="position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                MLM
            </div>                         

            <div class="container-fluid mt-3">

                <div class="row">

                    <div class="col-lg-6 col-sm-12 mx-auto">
                        
                        <h1 class="text-center font-weight-bold">{!! $title !!}</h1>
                        @if(count($errors) > 0)
                        <div class="alert alert-danger pt-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(\Session::has('error'))
                        <div class="alert alert-danger pt-4">
                            <p>{{\Session::get('error')}}</p>
                        </div>
                        @endif

                        @if(\Session::has('success'))
                        <div class="alert alert-success pt-4">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                        @endif

                        <div class="card">

                            <div class="card-header font-weight-bold">Password Reset Information</div>

                            <div class="card-body">

                            <form method="post" action="{{url('/update-password')}}">
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="form-group">
                                    <label class="font-weight-bold">Current Password: </label><input type="password" name="current_password" class="form-control">
                                    <label class="font-weight-bold">New Password: </label><input type="password" name="new_password" class="form-control">
                                    <label class="font-weight-bold">Re-type new password: </label><input type="password" name="retype_new_password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection