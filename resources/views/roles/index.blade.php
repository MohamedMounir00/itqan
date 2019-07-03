@extends('layouts.app')


@section('content')
    <div class="col-sm-12">
    <div class="white-box">
        {{-- <h3 class="box-title m-b-0">Bordered Table</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p> --}}
        <div class="table-responsive">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ trans('backend.role') }}</h2>
                    </div>
            @can('role-create')

                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> <i class="fa fa-save"></i></a>
                        </div>
                    @endcan
                </div>
            </div>





            <table class="table table-bordered">
                <tr>
                    <th>{{ trans('backend.name') }}</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->name }}</td>

                        <td>

                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                            @if($role->name !='admin')

                            @can('role-edit')
                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('role-delete')

                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmDelete()']) !!}

                                    {!! Form::submit(trans('backend.delete'), ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            @endif

                        </td>
                    </tr>
                @endforeach
            </table>


        </div>
    </div>
    </div>

@endsection

@section('scripts')
>

    <script>

        function ConfirmDelete()
        {
            var x = confirm("{{trans('backend.ask_delete_role')}}");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endsection