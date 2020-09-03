@extends('layouts.master')

@section('title')
    Transaction Form | MLM
@endsection

@section('nav')

    <li class="active ">
        <a href="/client-dashboard">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li>
        <a href="/client-manual">
            <i class="now-ui-icons design_vector"></i>
            <p>Manual Binary</p>
        </a>
    </li>
    <li>
        <a href="/client-universal">
            <i class="now-ui-icons design_vector"></i>
            <p>Universal Binary</p>
        </a>
    </li>
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

                            <div class="card-header font-weight-bold">Transaction Form</div>

                            <div class="card-body">


                            <form method="post" action="{{url('/client-withdraw/transaction')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="font-weight-bold">Total Balance: </label><input type="text" name="total_balance" class="form-control" value="{{ $total_balance }}" readonly>
                                    <label class="font-weight-bold">Amount: </label><input type="text" name="amount" class="form-control">
                                    <label class="font-weight-bold">Email: </label><input type="email" name="email" class="form-control">
                                    <label class="font-weight-bold">Password: </label><input type="password" name="password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
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