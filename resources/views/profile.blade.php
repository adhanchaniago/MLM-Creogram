@extends('layouts.master')

@section('title')
    Profile | MLM
@endsection

@section('css_design')
    <style>
        .main-section{
            border:1px solid #A0AEC1;
            background-color: #fff;
        }
        .profile-header{
            background-color: #A0AEC1;
            height:150px;
        }
        .user-detail{
            margin:-75px 0px 30px 0px;
        }
        .user-detail img{
            height:150px;
            width:150px;
        }
        .user-detail h5{
            margin:15px 0px 5px 0px;
        }
        .user-social-detail{
            padding:15px 0px;
            background-color: #A0AEC1;
        }
        .user-social-detail a i{
            color:#fff;
            font-size:23px;
            padding: 0px 5px;
        }
        .profile-text{
            font-size: 1rem;
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
    <div class="container">
        @if(count($errors) > 0)
        <div class="col-lg-6 col-sm-12 col-12 alert alert-danger pt-4 mx-auto">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(\Session::has('error'))
        <div class="col-lg-6 col-sm-12 col-12 alert alert-danger pt-4 mx-auto">
            <p>{{\Session::get('error')}}</p>
        </div>
        @endif

        @if(\Session::has('success'))
        <div class="col-lg-6 col-sm-12 col-12 alert alert-success pt-4 mx-auto">
            <p>{{\Session::get('success')}}</p>
        </div>
        @endif

        <div class="row">
            
            <div class="col-lg-6 col-sm-12 col-12 main-section text-center mx-auto">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
                </div>
                <div class="row user-detail">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <img src="{{ asset('images/blank-profile-picture.webp') }}" class="rounded-circle img-thumbnail">
                        <h1>{{ $member->full_name}}</h1>

                        <p>
                            <h5 class="font-weight-bold">ID:</h5>
                            <span class="profile-text">{{ $member->id}}</span><br />
                        </p>
                        
                        <p>
                            <h5 class="font-weight-bold">Email:</h5>
                            <span class="profile-text">{{ $member->email}}</span><br />
                        </p>
                        <p>
                            <h5 class="font-weight-bold">Contact Number:</h5>
                            <span class="profile-text">{{ $member->contact_number }}</span><br />
                        </p>
                        <p>
                            <h5 class="font-weight-bold">Serial Number:</h5>
                            <span class="profile-text">{{ $member->serial_number}}</span><br />
                        </p>
                        <hr>
                        <a href="/update-profile" class="btn btn-primary btn-sm pt-3 pb-3">Update Profile</a>

                    </div>
                </div>
                <div class="row user-social-detail">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection