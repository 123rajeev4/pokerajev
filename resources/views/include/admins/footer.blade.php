<!-- edit_profile -->
<div class="modal fade bd-example-modal-sm" id="adminModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-profile-pop">
                <button class="close closeprofile" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title">
                   Admin Profile
                </h4>
            </div>
            <form action="{{url('admin/edit_profile')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body model-body-profile-pop">
                    <div class="profile-popup">
                        <div class="profile-img" ng-if="!data.image">
                            <?php $img = Auth::user()->image; ?>
                            <div class="uploader" onclick="$('#filePhoto').click()">
                                <img alt="profile" class="img-responsive center-block" src="{{ asset('/profile')."/".$img}}"> </img>
                                <input type="file" name="image"  id="filePhoto" />
                            </div>
                        </div>
                        <div class="profile-feild">
                            <ul>
                                <li>
                                    <div class="profile-pop-det">
                                        <span class="profile-nametitle serviceType">
                                          Name
                                        </span>
                                        <p>
                                        <input type="text" name="name"  class="dtt"  value="{{Auth::user()->name}}"  ng-minlength="3" required>
                                        {{ csrf_field() }}
                                       </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-pop-det">
                                        <span class="profile-nametitle serviceType">
                                          Email
                                        </span>
                                        <p>
                                        <input type="email" name="email"  class="dtt"  value="{{Auth::user()->email}}"  required>
                                       </p>
                                    </div>
                                </li>
                                 <input type="submit"  class="btn btnModel" value="Submit"  />
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- change_password -->
    <div class="modal fade bd-example-modal-sm" id="passwordModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-profile-pop">
                <button class="close closeprofile" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title">
                   Change Password
                </h4>
            </div>
            <div class="modal-body model-body-profile-pop">
                <div class="profile-popup">
                    <div class="profile-feild">
                        <form action="{{url('admin/change_password')}}" method="post" >
                            <ul>
                                <li>
                                    <div class="profile-pop-det">
                                        <span class="profile-nametitle serviceType">
                                          Current Password
                                        </span>
                                        <p>
                                        <input type="password" name="current_password"  class="dtt"  required>
                                        {{ csrf_field() }}
                                       </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-pop-det">
                                        <span class="profile-nametitle serviceType">
                                          New Password
                                        </span>
                                        <p>
                                        <input type="password" name="new_password"  class="dtt"   required>
                                       </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="profile-pop-det">
                                        <span class="profile-nametitle serviceType">
                                          Confirm Password
                                        </span>
                                        <p>
                                        <input type="password" name="confirm_password"  class="dtt"   required>
                                       </p>
                                    </div>
                                </li>
                                 <input type="submit"  class="btn btnModel" value="Submit"  />
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var imageLoader = document.getElementById('filePhoto');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        
        $('.uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
}
    
</script>