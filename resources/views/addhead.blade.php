@extends('layouts.master')

@section('title')
    Add Head MLM | MLM
@endsection

@section('css_design')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" >
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

    <li class="active ">
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

                            <div class="card-header font-weight-bold">Head Member Information</div>

                            <div class="card-body">

                            <form method="post" action="{{url('member/create-head')}}" id="form">
                                {{csrf_field()}}
                                <div class="form-group">
                                <label class="font-weight-bold">Input Code: </label><input type="text" name="input_code" class="form-control" value="{{ $input_code }}" readonly>
                                    <label class="font-weight-bold">Full Name: </label><input type="text" name="full_name" class="form-control">
                                    <label class="font-weight-bold">Email: </label><input type="email" name="email" class="form-control">
                                    <label class="font-weight-bold">Contact Number: </label><input type="text" name="contact_number" class="form-control">
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <script>
        $("#add-button").on("click", function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Please check the information',
                text: "Some information you've entered can't be edited or deleted",
                type: "warning",
                icon: 'warning',
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
                }).then((result) => {
                if (result.value) {
                    console.log(result.value)
                    $("#form").submit();
                }
            })
        });
    </script>
@endsection