<div class="table-responsive">

    <table id="table2" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
        <tr>
            <th>{{trans('backend.persion')}}</th>
            <th>{{trans('backend.status')}}</th>

            <th>{{trans('backend.update_status_order_reason')}}</th>
            <th>{{trans('backend.date')}}</th>


        </tr>
        </thead>


        <tbody>
        @foreach($status_change as $a)
            <tr>
                <td>{{$a->user->name}}</td>
                <td>
                    @if ($a->status=='new')
                        {{trans('api.watting_techaincall',[],$lang)}}
                    @elseif ($a->status=='wating')
                        {{ trans('api.new_order',[],$lang)}}
                    @elseif ($a->status=='done')
                        {{trans('api.done_order',[],$lang)}}
                    @elseif ($a->status=='can_not')
                        {{trans('api.can_not',[],$lang)}}
                    @elseif ($a->status=='consultation')
                        {{trans('api.consultation',[],$lang)}}
                    @elseif ($a->status=='delay')
                        {{trans('api.delay',[],$lang)}}
                    @elseif ($a->status=='need_parts')
                        {{trans('api.need_parts',[],$lang)}}
                    @elseif ($a->status=='another_visit_works')
                        {{trans('api.another_visit_works',[],$lang)}}

                    @endif</td>
                <td>{{$a->reason}}</td>
                <td>{{$a->created_at}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>