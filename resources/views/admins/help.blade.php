@extends('layout.admins') 
@section('title', 'User List')
@section('content')

<div class="row">
</div>
    <div class="col-md-12">
        <!-- BORDERED TABLE -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    User Management List
                </h3>

            </div>
            <div class="panel-body">
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
                                Status
                            </th>
                        </tr>
                    </thead>
                    @if(!empty($users))
                    <tbody>
                        <?php $i=0;?>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ ++$i }}
                            </td>
                            <td>
                                {{$user->message}}
                            </td>
                                                       
 <!--                            <td>
 <img src="{{$user->image}}" id="profile-img-tag" width="200px" />
                            </td> -->

                            <td>   
@if($user->status == 'Active')
<a class="action_an btn btn-danger delete"  title='{{$user->id}}' title1="<?php echo "Inactive" ?>" id="status" href="javascript:void(0)" >
                                    <span class="dlt_icon">
                                        <?php echo "Active" ?>
                                         </span>
                                        </a>
                                         @else

                                          <a class="action_an btn btn-success delete"  title='{{$user->id}}' title1="<?php echo "Active" ?>" id="status" href="javascript:void(0)" >
                                    <span class="dlt_icon">
                                        {{$user->status}}
                                         </span>
                                        </a>
                                      @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
       
        <!-- END BORDERED TABLE -->
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
// When click the button.
$(".delete").click(function() {

    // Assigning Variables to Form Fields
    var ad_value = 'user';
    var id = $(this).attr("title");
    var status = $(this).attr("title1");
    ///alert(status);
     
 $.ajax({
     url: 'fetch_status',
     type: 'POST',
     data: {"_token": "{{ csrf_token() }}",id:id,status:status,ad_value:ad_value},
     success: function(response){
     location.reload();
    }
   });
});

});
</script>

@endsection