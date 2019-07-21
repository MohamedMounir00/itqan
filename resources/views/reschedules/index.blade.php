@extends('layouts.app')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('backend.reschedules_order')}}
                    </h3>
                </div>
            </div>

            <div class="kt-portlet__body">
                    <div class="table-responsive">

                            <table id="table1" class="table table-striped table-bordered bulk_action table1">
                                <thead>
                                <tr>
                                    <th>{{trans('backend.time_reschedules')}}</th>
                                    <th>{{trans('backend.date_reschedules')}}</th>
                                    <th>{{trans('backend.status')}}</th>
                                    <th>{{trans('backend.technical_reschedules')}}</th>
                                    <th>{{trans('backend.date')}}</th>
            
                                    <th>{{trans('backend.details')}}</th>
                                    <th>{{trans('backend.action')}}</th>
            
                                </tr>
                                </thead>
            
            
                                <tbody>
            
            
            
                                </tbody>
                            </table>
                            </div>
            </div>
</div>




{{-- 

    <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('backend.reschedules_order')}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>



                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">

                <table id="table1" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{trans('backend.time_reschedules')}}</th>
                        <th>{{trans('backend.date_reschedules')}}</th>
                        <th>{{trans('backend.status')}}</th>
                        <th>{{trans('backend.technical_reschedules')}}</th>
                        <th>{{trans('backend.date')}}</th>

                        <th>{{trans('backend.details')}}</th>
                        <th>{{trans('backend.action')}}</th>

                    </tr>
                    </thead>


                    <tbody>



                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
@section('scripts')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/app/custom/general/crud/datatables/advanced/column-rendering.js')}}"></script>
    <script>
        $(function() {
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('reschedules.get_reschedules') !!}',
                columns: [
                    { data: 'time', name: 'time' },
                    { data: 'date', name: 'date' },
                    { data: 'status', name: 'status',searchable: true },
                    { data: 'technical', name: 'technical' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'order', name: 'order' },
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
                title: "{{trans('backend.ask_reschedules')}}",
                type: "warning",
                buttons: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                buttons: ['{{trans('backend.no')}}', '{{trans('backend.yes')}}'],

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
