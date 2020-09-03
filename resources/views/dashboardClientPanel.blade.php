@extends('layouts.master')

@section('title')
    Client Dashboard | MLM
@endsection

@section('chart_script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['', 'Weekly Income', { role: 'style'}],
                ['<?php echo $filter1_name ?>', <?php echo $filter1_income ?>, 'gold'],
                ['<?php echo $filter2_name ?>', <?php echo $filter2_income ?>, 'silver'], 
                ['<?php echo $filter3_name ?>', <?php echo $filter3_income ?>, 'gold'],
                ['<?php echo $filter4_name ?>', <?php echo $filter4_income ?>, 'silver' ],
                ['<?php echo $filter5_name ?>', <?php echo $filter5_income ?>, 'gold' ],
            ]);

            
            var options = {
                hAxis: {
                title: 'Per Week'
                },
                vAxis: {
                title: 'Income'
                },
                backgroundColor: '#f1f8e9'  
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

            chart.draw(data, options); 
        }
    </script>
@endsection

@section('css_design')
    <style>

        #chart_div{
            overflow-x: auto;
            overflow-y: hidden;
        }

        #manual-button{
            background-color: #6096BA;
        }

        #universal-button{
            background-color: #A3CEF1;
        }

        #referral-button{
            background-color: #8B8C89;
        }

        #withdraw-button{
            background-color: #274C77;
        }

        @media (max-width: 575.98px) {
            #chart_div::-webkit-scrollbar{
                width: 0;
            }

            h3{
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('nav')
    <li class="active ">
        <a href="/client-dashboard">
            <i class="now-ui-icons business_chart-bar-32"></i>
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
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title">Client Dashboard</h4>
                    <p class="category">Information</p>
                </div>

                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title"> Total Earning</h4>
                </div>
                <div class="card-body">
                    <span class="h4">&#8369;{{ $total_income }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Total Balance</span><a id="withdraw-button" class="float-right btn btn-sm m-0" href="/client-withdraw" >Withdraw</a>
                </div>
                <div class="card-body">
                    <span class="h4">&#8369;{{ $total_balance }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 container">
            <a href="/client-manual" id="manual-button" class="btn btn-lg active" role="button" aria-pressed="true"><span class="pl-2 h4">Total Manual Member:<br />{{ $total_member }}</span></a>
        </div>

        <div class="col-md-4 container">
            <a href="/client-universal5450" id="universal-button" class="btn btn-lg active" role="button" aria-pressed="true"><span class="pl-2 h4">Total Universal Member:<br />{{ $total_goldmember }}</span></a>
        </div>

        <div class="col-md-4 container">
            <a href="#" id="referral-button" class="btn btn-lg active" role="button" aria-pressed="true"><span class="pl-2 h4">Total Referred Members:<br />{{ $total_referred_members }}</span></a>
        </div>

    </div>
@endsection

@section('scripts')

@endsection