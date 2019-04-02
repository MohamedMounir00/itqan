@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.order_view')}}</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">

                <table id="table1" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{trans('backend.order_id')}}</th>
                        <th>{{trans('backend.client')}}</th>
                        <th>{{trans('backend.status_admin')}}</th>
                        <th>{{trans('backend.date')}}</th>
                        <th>{{trans('backend.details')}}</th>

                        <th>{{trans('backend.add_techanel')}}</th>

                    </tr>
                    </thead>


                    <tbody>



                    </tbody>
                </table>
                <br>
                <span > <label class="btn btn-danger"></label> {{trans('backend.desc_assigen_index')}}</span>
            </div>
        </div>
    </div>
    </div>@endsection
@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
           // var table = $('#example').DataTable();



            $('#table1').DataTable({

                processing: true,
                serverSide: true,
                "searching": true,

                ajax: '{!! route('order.get_order_assign') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'client', name: 'client'  , searchable: true },
                    { data: 'reply', name: 'reply' , searchable: true},
                    { data: 'created_at', name: 'created_at' },

                    {data: 'details', name: 'action', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ],

                "language": {
                    "decimal": "",
                    "emptyTable": "{{trans('backend.No_data_available_in_table')}}",
                    "infoEmpty": "{{trans('backend.Showing_0_to_0_of_0_entries')}}",
                    "info":           "{{trans('backend.showing')}}_START_ {{trans('backend.to')}} _END_ {{trans('backend.of')}} _TOTAL_{{trans('backend.entries')}} ",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "{{trans('backend.show_t')}}_MENU_ {{trans('backend.entries')}}",
                    "search": "{{trans('backend.search')}}",
                    "zeroRecords": "{{trans('backend.No_matching_records_found')}}",
                    "processing":     "{{trans('backend.processing')}}",

                    "paginate": {
                        "first": "{{trans('backend.First')}}",
                        "last": "{{trans('backend.Last')}}",
                        "next": "{{trans('backend.Next')}}",
                        "previous": "{{trans('backend.Previous')}}"
                    }

                }
            });
        });
    </script>
    <script>
        $('#table1').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            ;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');



            swal({
                title: "{{trans('backend.ask_delete')}}",
                type: "warning",
                buttons: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then(function(yes) {
                if (yes) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', submit: true}
                    }).always(function (data) {
                        $('#table1').DataTable().draw(false);
                    });
                }
                else {
                    return false;
                }
            })

        })
    </script>
@endsection
