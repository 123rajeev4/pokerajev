@extends('layouts.admins') 
@section('title', 'Ads List')
@section('content')

<div class="row">
</div>
    <div class="col-md-12">
        <!-- BORDERED TABLE -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Genre List
                </h3>
                <a style="float:right;margin-bottom:10px;" class="action_an btn btn-primary" href="{{url('admin/ad-genre')}}" >
                                Add New Genre                                        
                                </a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Name
                            </th>
                            
                            <th>
                                Date
                            </th>
                            <th>
                             Action 
                             </th>
                         <!--    <th>
                                Status
                            </th> -->
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
                            {{$user->name}}
                                
                            </td>
                            <td>
                                {{$user->created_at}}
                            </td>
                           
                           
                            
                            
                           
                             <td>
                           
                                <a class="action_an" href="{{url('admin/common_delete')}}/{{$user->id}}/topics" >
                                    <span class="dlt_icon">
                                        <img class="img-responsive" src="{{url('/public')}}/img/delete-button.png"/>
                                    </span>
                                </a>
                             </td>
                            <!-- <td>
                               
                               
                                        @if($user->status == 0)
                                         <a class="action_an btn btn-danger" href="{{url('admin/change_status_ad')}}/{{$user->id}}" >
                                    <span class="dlt_icon">
                                        <?php echo "Inactive"; ?>
                                         </span>
                                </a>
                                        @else
                                         <a class="action_an btn btn-success" href="{{url('admin/change_status_ad')}}/{{$user->id}}" >
                                    <span class="dlt_icon">
                                        <?php echo "Active" ?>
                                         </span>
                                </a>
                                        @endif
                                   
                            </td> -->
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

@endsection