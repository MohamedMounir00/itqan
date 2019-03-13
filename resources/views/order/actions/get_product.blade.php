
@extends('layouts.app')

@section('content')

    @php
        $lang= Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale()



    @endphp
    @include('partials.messages')

    <div class="x_panel">
        <div class="x_title">
            <h2>{{trans('backend.product_wating')}}</h2>
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
                        <th>{{trans('backend.name')}}</th>
                        <th>{{trans('backend.price')}}</th>
                        <th>{{trans('backend.amount')}}</th>
                        <th>{{trans('backend.currency')}}</th>

                        <th>{{trans('backend.action')}}</th>

                    </tr>
                    </thead>


                    <tbody>
                    @foreach($cart as $a)
                        <tr id="{{$a->id}}">
                            <td><a href="{{route('product.show', $a->product->id)}}">{{unserialize($a->product->name)[$lang]}}</a></td>
                            <td>{{$a->product->price}}</td>
                            <td>{{$a->amount}}</td>
                            <td>{{unserialize($a->product->currency->name)[$lang]}}</td>

                            <td>
                                <button class="btn btn-delete btn btn-round  btn-danger" data-remote="{{$a->id }}" data-id="{{ $a->id }}"><i class="fa fa-remove"></i></button>
                                <button class="btn btn-agree btn btn-round  btn-success" data-remote="{{$a->id }}" data-id="{{ $a->id }}"><i class="fa fa-check"></i></button>
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
                title: "{{trans('backend.ask_refused')}}",
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
    <script>

        $('#table2').on('click', '.btn-agree[data-remote]', function (e) {
            e.preventDefault();
            ;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var id = $(this).data('id');



            swal({
                title: "{{trans('backend.ask_agree')}}",
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
                        type: 'POST',
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
