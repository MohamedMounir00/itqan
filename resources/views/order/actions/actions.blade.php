
@extends('layouts.app')

@section('content')
    @include('partials.messages')


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{trans('backend.assigen_in_order')}}
                </h3>
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
                                    <th>{{trans('backend.assgin_id')}}</th>
                                    <th>{{trans('backend.assgin_technical')}}</th>
                                    <th>{{trans('backend.assgin_status')}}</th>
                                    <th>{{trans('backend.reason_rejection')}}</th>
            
                                    <th>{{trans('backend.date')}}</th>
            
            
                                </tr>
                                </thead>
            
            
                                <tbody>
                                @foreach($actions as $a)
                                    <tr>
                                        <td>{{$a->id}}</td>
                                        <td>{{$a->user->name}}</td>
                                        <td>
                                            @if($a->status=='watting')
                                                <span>{{trans('backend.assgin_watting')}}</span>
                                            @elseif($a->status=='agree')
                                                <span>{{trans('backend.assgin_accpet')}}</span>
                                            @else
                                                <span>{{trans('backend.assgin_refused')}}</span>
                                            @endif
                                        </td>
                                        <td>{{$a->reason_rejection}}</td>
                                        <td>{{$a->created_at}}</td>
            
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
            <h2>{{trans('backend.assigen_in_order')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>



            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">

                <table id="table2" class="table table-striped table-bordered bulk_action table1">
                    <thead>
                    <tr>
                        <th>{{trans('backend.assgin_id')}}</th>
                        <th>{{trans('backend.assgin_technical')}}</th>
                        <th>{{trans('backend.assgin_status')}}</th>
                        <th>{{trans('backend.reason_rejection')}}</th>

                        <th>{{trans('backend.date')}}</th>


                    </tr>
                    </thead>


                    <tbody>
                    @foreach($actions as $a)
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->user->name}}</td>
                            <td>
                                @if($a->status=='watting')
                                    <span>{{trans('backend.assgin_watting')}}</span>
                                @elseif($a->status=='agree')
                                    <span>{{trans('backend.assgin_accpet')}}</span>
                                @else
                                    <span>{{trans('backend.assgin_refused')}}</span>
                                @endif
                            </td>
                            <td>{{$a->reason_rejection}}</td>
                            <td>{{$a->created_at}}</td>

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

            });

        });
    </script>
@endsection
