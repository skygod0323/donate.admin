@extends('adminlte::page')

@section('title', 'Donations')

@section('content_header')
    <div>
        <h1 style="display: inline-block; margin-top: 10px">Donations</h1>
        <button id="btn_export" class="btn btn-success" style="float: right; margin-top: 20px">Export to Excel</button>
    </div>
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
                        <!-- <td>Action</td> -->
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
                            {   data: data => '£' + data.amount }
                            // {
                            //     width: '60px',
                            //     data: function(data) {
                            //         var html = '<a class="btn btn-xs btn-success action_btn" style="margin-right:5px">View</a>';
                            //         return html;
                            //     }
                            // }
                            
                        ]
                    });
                }
            }

            function exportExcel() {
                const headers = ['Name', 'Email', 'Phone', 'Donataion Type', 'Amount', 'Payment Methoud', 
                                'Gift Aid','Donor Wall', 'Donor Wall Name', 'Get SMS', 'Get Email',
                                'Company', 'House', 'Apartment', 'Town / City', 'Country', 'Postcode'
                                ];

                let csv = headers.join(',');
                csv += '\n';

                console.log(donations);
                
                donations.forEach((row) => {
                    csv += row.first_name + ' ' + row.last_name + ',';
                    csv += row.email + ',';
                    csv += row.phone + ',';
                    csv += (row.type == 'single' ? 'Single Donation' : 'Montly Donation' ) + ',';
                    csv += '£' + row.amount + ',';
                    csv += 'Credit/Debit Card' + ',';
                    csv += (row.gift_add ? 'Yes' : 'No') + ',';
                    csv += (row.donor_wall ? 'Yes' : 'No') + ',';
                    csv += row.donor_wall_name ? row.donor_wall_name + ',' : ',';
                    csv += (row.get_sms ? 'Yes' : 'No') + ',';
                    csv += (row.get_email ? 'Yes' : 'No') + ',';

                    if (row.billing) {
                        const billing = row.billing;
                        csv += billing.company ? billing.company + ',' : ',';
                        csv += billing.house ? billing.house + ',' : ',';
                        csv += billing.apartment ? billing.apartment + ',' : ',';
                        csv += billing.city ? billing.city + ',' : ',';
                        csv += billing.country ? billing.country + ',' : ',';
                        csv += billing.postcode ? billing.postcode : '';
                    } else {
                        csv += ',,,,,'
                    }
                    csv += '\n';
                })

                console.log(csv);

                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'donations.csv';
                hiddenElement.click();
            }

            $('#btn_export').click(() => {
                exportExcel();
            })
        })
    </script>
@stop