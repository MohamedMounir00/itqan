@extends('layouts.app')

@section('content')

    <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('backend.technical')}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

             

                    <li><a   href="{{route('technical.create')}}" class=""><i class="fa fa-plus-square"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">

                <table id="table1" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{trans('backend.name')}}</th>
                        <th>{{trans('backend.image')}}</th>
                        <th>{{trans('backend.email')}}</th>
                        <th>{{trans('backend.phone')}}</th>
                        <th>{{trans('backend.job')}}</th>
                        <th>{{trans('backend.country')}}</th>
                        <th>{{trans('backend.date')}}</th>
                        <th>{{trans('backend.action')}}</th>

                    </tr>
                    </thead>


                    <tbody>



                    </tbody>
                </table>
                </div>
            </div>
        </div>

  @endsection
@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
            $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('technical.get_technical') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'image', name: 'image' } ,
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'category', name: 'category' },
                    { data: 'country', name: 'country' },
                    { data: 'created_at', name: 'created_at' },

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
