@extends('layouts.master')

@section('title')
    Manual Binary| MLM
@endsection

@section('nav')
    <li>
        <a href="/client-dashboard">
            <i class="now-ui-icons business_chart-bar-32"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="active ">
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

@section('chart_script')
    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script>
        let members = <?php echo json_encode($members); ?>;
        let goback = <?php echo $goback ?>;

        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            let data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Node');

            let arrNodeChart = [];
        
            if (goback == 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "1",
                            'f' : '<h3>' + members[0].id + '</h3>'
                        },''    
                    ]
                )
            } else {
                arrNodeChart.push(
                    [
                        {
                            'v' : "1",
                            'f' : "<h3> <a href='/client-manual?child="+ goback +"' class='nodelink'>" + members[0].id + "</a></h3>"
                        },''    
                    ]
                )
            }
            

            if(members[1]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "2",
                            'f' : '<h3>' + members[1].id + '</h3>'
                        },'1'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "2",
                            'f' : ' '
                        },'1'    
                    ]
                )
            }

            if(members[2]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "3",
                            'f' : '<h3>' + members[2].id + '</h3>'
                        },'1'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "3",
                            'f' : ' '
                        },'1'    
                    ]
                )
            }

            if(members[3]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "4",
                            'f' : "<h3> <a href='/client-manual?child="+ members[3].id +"' class='nodelink'>" + members[3].id + "</a></h3>"
                        },'2'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "4",
                            'f' : ' '
                        },'2'    
                    ]
                )
            }

            if(members[4]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "5",
                            'f' : "<h3> <a href='/client-manual?child="+ members[4].id +"' class='nodelink'>" + members[4].id + "</a></h3>"
                        },'2'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "5",
                            'f' : ' '
                        },'2'    
                    ]
                )
            }

            if(members[5]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "6",
                            'f' : "<h3> <a href='/client-manual?child="+ members[5].id +"' class='nodelink'>" + members[5].id + "</a></h3>"
                        },'3'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "6",
                            'f' : ' '
                        },'3'    
                    ]
                )
            }

            if(members[6]['id'] != 0){
                arrNodeChart.push(
                    [
                        {
                            'v' : "7",
                            'f' : "<h3> <a href='/client-manual?child="+ members[6].id +"' class='nodelink'>" + members[6].id + "</a></h3>"
                        },'3'    
                    ]
                )
            }else{
                arrNodeChart.push(
                    [
                        {
                            'v' : "7",
                            'f' : ' '
                        },'3'    
                    ]
                )
            }

            data.addRows(arrNodeChart);
            
            // Create the chart.
            let chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {'allowHtml':true});
        }

    </script>

@endsection

@section('css_design')
    <style>
        table{
            border-collapse: separate !important;
        }

        #chart_div{
            height: 50vh;
            /* background-color: lightblue; */
            overflow-x: auto;
            overflow-y: auto;
        }

        #table_data{
            height: 75vh;
            overflow-x: auto;
        }

        #add-button{
            background-color: #274C77;
        }

        .nodelink{
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;

            text-decoration: none !important;
            color: black !important;

            display:inline-block;
            width: 100%;
            height: 100%;
            border: 0px;
            
            background-color: #DDEFF6;
            font-family: arial,helvetica;
        }

        @media (max-width: 575.98px) {
            #chart_div::-webkit-scrollbar{
                width: 0;
            }

            h3{
                font-size: 1rem;
            }

            #table_data::-webkit-scrollbar{
                width: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card card-plain">
                <div class="card-header">
                    <span class="card-title h4">Client Panel</span><button id="add-button" class="float-right btn btn-sm m-0">Add Member</button>
                    <p class="category">Manual Binary</p>
                </div>
                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="card-title h4"> Member's Table</span>
                </div>
                <div class="card-body">
                <div class="table-responsive" id="table_data">
                    <table class="table">
                    <thead>
                        <th scope="col" class="font-weight-bold"> ID# </th>
                        <th scope="col" class="font-weight-bold"> Name</th>
                        <th scope="col" class="font-weight-bold"> Contact Number </th>
                        <th scope="col" class="font-weight-bold"> Referral </th>
                        <th scope="col" class="font-weight-bold"> Income </th>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            @if($member['id'] != 0)
                            <td scope="row"> {{ $member->id }} </td>
                            <td> {{ $member->full_name }} </td>
                            <td> {{ $member->contact_number }} </td>
                            <td> {{ $member->referred_by }} </td>
                            <td> {{ $member->income }} </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')

@endsection