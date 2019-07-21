      
      <div class="kt-portlet__body">
        <div class="dataTables_wrapper dt-bootstrap4 no-footer" id="kt_table_1_wrapper">
          <div class="row">
              <div class="col-md-12">
                   
      <div class="table-responsive">

          <table id="table2" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
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
              </div>
          </div>
        </div>
      </div>


      
      
   