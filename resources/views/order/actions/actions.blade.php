
@extends('layouts.app')

@section('content')
    @include('partials.messages')

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
    </div>

@endsection
@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#table2').DataTable({

            });

        });
    </script>
@endsection
