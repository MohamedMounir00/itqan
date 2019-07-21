@extends('layouts.app')

@section('content')
    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()



    @endphp
    @include('partials.messages')



    <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                                {{trans('backend.cities')}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                                @can('city-create')
                            <div class="kt-portlet__head-actions">
                                <a href="{{route('cities.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    {{trans('backend.create')}}

                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>


                <div class="kt-portlet__body">
                        <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="kt_table_1_wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="table-responsive">

                                                    <table id="table2" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                                                        <thead>
                                                        <tr>
                                                            <th>{{ trans('backend.name') }}</th>
                                    
                                                            <th>{{trans('backend.action')}}</th>
                                    
                                                        </tr>
                                                        </thead>
                                    
                                    
                                                        <tbody>
                                                        @foreach($cities as $national)
                                                               <tr id="{{$national->id}}">
                                                                   <td>
                                                                @if($lang== 'ar')
                                                                    {{ $national->name_ar }}
                                                                @else
                                                                    {{ $national->name_en }}
                                                                @endif
                                                                   </td>
                                                                <td>
                                                                    @can('city-edit')
                                    
                                                                    <a href="{{ route('cities.edit', $national->id)}}" class="btn btn-square  btn-primary"> {{trans('backend.update')}}</a>
                                                                  @endcan
                                                                        @can('city-delete')
                                                                    <button class="btn btn-delete btn btn-square  btn-danger" data-remote="{{$national->id }}" data-id="{{ $national->id }}">{{trans('backend.delete')}}</button>
                                                                        @endcan
                                    
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                        </div>
                </div>
    </div>

























{{-- 


    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.cities')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


                @can('city-create')

                <li><a   href="{{route('cities.create')}}" class=""><i class="fa fa-plus-square"></i></a>
                </li>
                    @endcan
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
                    @foreach($cities as $national)
                           <tr id="{{$national->id}}">
                               <td>
                            @if($lang== 'ar')
                                {{ $national->name_ar }}
                            @else
                                {{ $national->name_en }}
                            @endif
                               </td>
                            <td>
                                @can('city-edit')

                                <a href="{{ route('cities.edit', $national->id)}}" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i> {{trans('backend.update')}}</a>
                              @endcan
                                    @can('city-delete')
                                <button class="btn btn-delete btn btn-round  btn-danger" data-remote="{{$national->id }}" data-id="{{ $national->id }}"><i class="fa fa-remove"></i>{{trans('backend.delete')}}</button>
                                    @endcan

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection






@section('scripts')

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





