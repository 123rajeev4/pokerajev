@extends('layouts.admins')
@section('title', 'Message Template List')
@section('content')

<div class="row">
</div>
    <div class="col-md-12">
        <!-- BORDERED TABLE -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                  Message Template List
                </h3>
            </div>
            <div class="panel-body">
                <button style="float: right;" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add Message Template</button>
                <table class="table table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    @if(!empty($messages))
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($messages as $value)
                        <tr>
                            <td>
                                {{ ++$i }}
                            </td>
                            <td>
                                {{$value->message}}
                            </td>
                            <td>
                                <a class="action_an" href="javascript:void(0);" data-toggle="modal" data-target="#myModal" onclick="get_ads({{$value->id}})">
                                    <span class="dlt_icon">
                                        <img class="img-responsive" src="{{url('/public')}}/img/edit.png"/>
                                    </span>
                                </a>
                                <a class="action_an" href="javascript:void(0);" onclick="delete_user({{$value->id}})">
                                    <span class="dlt_icon">
                                        <img class="img-responsive" src="{{url('/public')}}/img/delete-button.png"/>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
 
    <!-- Bootstrap modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Message Template</h3>
      </div>
      <form action="{{url('admin/add_message_template')}}" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-body form">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Message</label>
              <div class="col-md-9">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">
                <input name="message" id="title" placeholder="Message" class="form-control" type="text" value="{{old('message')}}">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnSave"  class="btn btn-primary">Save</button>
            <button type="button" id="btnCancle" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
</div>
    <!-- END BORDERED TABLE -->
      

    
</div>
<script type="text/javascript">


    function delete_user(id){
        if (confirm('Are you sure you want to delete.') == true) {
            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'common_delete',
                datatType : 'json',
                type: 'POST',
                data: {
                    id:id,
                    table:'message_templates'
                },
                cache: false,
                success:function(response) {
                    if (response) {
                        location.reload();
                    }
                }
            });
        }else{
            return false;
        }
    }

    function get_ads(id){
        
            $.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'common_get',
                datatType : 'json',
                type: 'POST',
                data: {
                    id:id,
                    table:'message_templates'
                },
                cache: false,
                success:function(response) {
                    if (response) {
                        response = jQuery.parseJSON(response);
                        $("#title").val(response.message);
                        $("#id").val(response.id); 
                    }
                }
            });
    }
    $("#btnCancle").on("click",function(){
            window.location.reload();
        });

        $("#btnClose").on("click",function(){
            window.location.reload();
        });
</script>
@endsection