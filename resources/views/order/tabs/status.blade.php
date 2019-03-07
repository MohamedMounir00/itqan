<div class="table-responsive">

    <table id="table2" class="table table-striped table-bordered bulk_action table1">
        <thead>
        <tr>
            <th>{{trans('backend.id_pross')}}</th>
            <th>{{trans('backend.pross')}}</th>

            <th>{{trans('backend.date')}}</th>


        </tr>
        </thead>


       <tbody>
       @foreach($status as $a)
<tr>
    <td>{{$a->id}}</td>
   <td>{{unserialize($a->message)[$lang]}}</td>
  <td>{{$a->created_at}}</td>

</tr>
           @endforeach
        </tbody>
    </table>
</div>