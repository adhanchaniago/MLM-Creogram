@extends('layouts.master')

@section('title')
    View Serial Numbers | MLM
@endsection

@section('css_design')
    <style>
        .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
        background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked ~ .checkmark {
        background-color: #274C77;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked ~ .checkmark:after {
        display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        }
    </style>
@endsection

@section('nav')
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
    <li class="active ">
        <a href="/view-refcode?sort=0&page=1">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>View Referral Code</p>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Serial Number's Table</h4>

                @if ($sort == '0')
                    @if($serial_number_available_pagination_length > 1)
                        <ul class="pagination">
                            
                            @if ($page_no == '1')
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="/view-refcode?sort=0&page={{$page_no-1}}">Previous</a></li>
                            @endif

                            @for ($i = 1; $i <= $serial_number_available_pagination_length; $i++)
                                @if($i == $page_no)
                                <li class="page-item active"><a class="page-link" href="/view-refcode?sort=0&page={{$i}}">{{ $i }}</a></li>
                                @else
                                <li class="page-item"><a class="page-link" href="/view-refcode?sort=0&page={{$i}}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            @if ($page_no == $serial_number_available_pagination_length)
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="/view-refcode?sort=0&page={{$page_no+1}}">Next</a></li>
                            @endif

                        </ul>
                    @endif
                @else
                    @if($serial_number_all_pagination_length > 1)
                        <ul class="pagination">
                            
                            @if ($page_no == '1')
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="/view-refcode?sort=1&page={{$page_no-1}}">Previous</a></li>
                            @endif

                            @for ($i = 1; $i <= $serial_number_all_pagination_length; $i++)
                                @if($i == $page_no)
                                <li class="page-item active"><a class="page-link" href="/view-refcode?sort=1&page={{$i}}">{{ $i }}</a></li>
                                @else
                                <li class="page-item"><a class="page-link" href="/view-refcode?sort=1&page={{$i}}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            @if ($page_no == $serial_number_all_pagination_length)
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="/view-refcode?sort=1&page={{$page_no+1}}">Next</a></li>
                            @endif

                        </ul>
                    @endif
                @endif
                
            </div>
            <div class="form-check">
                <label class="container text-reset"><h5>Only Available</h5>
                    @if ($sort == '0')
                    <input type="checkbox" checked="checked" id="checkbox">
                    @else
                    <input type="checkbox" id="checkbox">
                    @endif
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th scope="col" class="font-weight-bold"> Serial Number</th>
                            <th scope="col" class="font-weight-bold"> Status</th>
                        </thead>
                        <tbody id="table-data">

                            @if ($sort == '0')
                                @foreach($serial_number_available_data as $code)
                                <tr>
                                    <td> {{ $code->input_code }} </td>
                                    <td> <span class="text-success">Available</span></td>
                                </tr>
                                @endforeach
                            @else
                                @foreach($serial_number_all_data as $code)
                                    @if($code->status == 0)
                                    <tr>
                                        <td> {{ $code->input_code }} </td>
                                        <td> <span class="text-success">Available</span></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td> {{ $code->input_code }} </td>
                                        <td> <span class="text-danger">Not Available</span></td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let checkbox = document.getElementById("checkbox");

        checkbox.addEventListener( 'change', function() {
            if(this.checked) {
                document.location.href='/view-refcode?sort=0&page=1';
            } else {
                document.location.href='/view-refcode?sort=1&page=1';
            }
        })
    </script>
@endsection