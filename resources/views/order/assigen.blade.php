@extends('layouts.app')

@section('content')
    @include('partials.messages')

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.order_view')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
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
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('order.get_order_assign') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'client', name: 'client' },
                    { data: 'reply', name: 'reply' },
                    { data: 'created_at', name: 'created_at' },

                    {data: 'details', name: 'action', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
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