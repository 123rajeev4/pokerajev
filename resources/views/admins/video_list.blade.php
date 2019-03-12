@extends('layouts.admins') 
@section('title', 'Video List')
@section('content')


<div class="row">
</div>
    <div class="col-md-12">
        <!-- BORDERED TABLE -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Video Management List
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
                                Video
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Uploader
                            </th>
                            <th>
                                Hashtag
                            </th>
                            <th>
                                Category
                            </th>
                            
                           
                            <th>
                                Date
                            </th>
                            <th>
                             Action 
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
                            <a href="{{$user->video_name}}" target="_blank">Play Video</a>
                          
                            </td>
                            <td >
                                {{trim($user->description)}}
                            </td>
                            <td>
                                <img alt="Avatar" class="img-circle" src="{{$user->image}}" style="height:50px">
                                </img>
                                <p>{{$user->name}}</p>
                            </td>
                            <td>
                                {{$user->tag_name}}
                            </td>
                             <td>
                                {{$user->category_name}}
                            </td>
                            
                            <td>
                            {{$user->created_at}}
                            </td>
                           
                             <td>
                            
                                <a class="action_an" href="{{url('admin/common_delete')}}/{{$user->id}}/videos" >
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
       
        <!-- END BORDERED TABLE -->
    </div>
</div>

@endsection