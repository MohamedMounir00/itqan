@extends('layouts.app')

@section('content')
    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()



    @endphp
    @include('partials.messages')
    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.nationalityl')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>



                <li><a   href="{{route('nationality.create')}}" class=""><i class="fa fa-plus-square"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">

                <table id="table2" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{ trans('backend.name') }}</th>

                        <th>{{trans('backend.action')}}</th>

                    </tr>
                    </thead>


                    <tbody>
                    @foreach($nationality as $national)
                           <tr id="{{$national->id}}">
                               <td>
                            @if($lang== 'ar')
                                {{ $national->name_ar }}
                            @else
                                {{ $national->name_en }}
                            @endif
                               </td>
                            <td>
                                <a href="{{ route('nationality.edit', $national->id)}}" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i> {{trans('backend.update')}}</a>
                                <button class="btn btn-delete btn btn-round  btn-danger" data-remote="{{$national->id }}" data-id="{{ $national->id }}"><i class="fa fa-remove"></i>{{trans('backend.delete')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection






@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#table2').DataTable({
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
        $('#table2').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var id = $(this).data('id');



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
                        $('#table2').DataTable().draw(false);
                        $('tr#'+id).remove();

                    });

                }
                else {
                    return false;
                }
            })

        })

    </script>


@endsection





