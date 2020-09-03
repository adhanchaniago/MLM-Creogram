@extends('layouts.master')

@section('title')
    Add Member | MLM
@endsection

@section('css_design')
    <style>
        #add-button{
            background-color: #274C77;
        }
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
        <a href="/admin-manual?batch=1">
            <i class="now-ui-icons design_vector"></i>
            <p>Manual Binary</p>
        </a>
    </li>
    <li>
        <a href="/admin-universal">
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
    <li class="active ">
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

                            <div class="card-header font-weight-bold">Member Information</div>

                            <div class="card-body">

                            <form method="post" action="{{url('member/create')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="font-weight-bold">Input Code: </label><input type="text" name="input_code" class="form-control" value="{{ $input_code }}" readonly>
                                    <label class="font-weight-bold">Full Name: </label><input type="text" name="full_name" class="form-control">
                                    <label class="font-weight-bold">Email: </label><input type="email" name="email" class="form-control">
                                    <label class="font-weight-bold">Contact Number: </label><input type="text" name="contact_number" class="form-control">
                                    <label class="font-weight-bold">Referred by: </label><input type="email" name="referred_by" class="form-control">
                                    <label for="inputState">Node:</label>
                                    <select id="inputState" class="form-control" name="node">
                                        <option selected>left</option>
                                        <option>right</option>
                                    </select>
                                </div>

                                <button type="submit" id="add-button" class="btn btn-block">Add</button>
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