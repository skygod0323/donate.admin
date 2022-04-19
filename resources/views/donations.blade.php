@extends('adminlte::page')

@section('title', 'Donations')

@section('content_header')
    <h1>Donations</h1>
@stop

@section('css')
    <style>
        .user_info img{
            width: 40px;
            height: 40px;
            border-radius: 100%;
            margin-right: 10px
        }

        tbody td {
            line-height: 40px!important;
        }
        
    </style>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <table id="donation-table" class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Donation Type</td>
                        <td>Amount</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>

@stop

@section('js')
    <script>
        $(function() {
            
            var dt;
            var donations = @json($donations);

            console.log(donations);

            initDt(donations);

            function initDt(dona) {
                if (!dt) {
                    dt = $('#donation-table').DataTable({
                        'data': dona,
                        'paging'      : true,
                        'lengthChange': false,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : false,
                        // "order": [[ 0, "desc" ]],
                        "columns": [ 
                            {
                                width: '20px',
                                render: function ( data, type, row, meta ) {
                                    return meta.row + 1;
                                },
                            },
                            {   data: data => data.first_name + ' ' + data.last_name },
                            {   data: 'email' },
                            {   
                                data: data => data.type == 'single' ? 'One time Donation' : 'Montly Donation'
                            },
                            {   data: 'amount' },
                            {
                                width: '60px',
                                data: function(data) {
                                    var html = '<a class="btn btn-xs btn-success action_btn" style="margin-right:5px">View</a>';
                                    return html;
                                }
                            }
                            
                        ]
                    });
                }
            }

         
        })
    </script>
@stop