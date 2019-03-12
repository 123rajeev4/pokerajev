<!-- LEFT SIDEBAR -->
<style>
.sidebar .nav > li > a.active {
    background-color: #252c35;
    border-left-color: #1c998c;
}

.sidebar .nav > li > a:hover i, .sidebar .nav > li > a:focus i, .sidebar .nav > li > a.active i {
    color: #1c998c;
}
</style>
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <?php $url=Request::url(); ?>
                    <ul class="nav">
                        <li>
    
    <a href="{{ url('admin/user_list')}}" <?php if(strpos($url, "admin/user_list")): ?> class="active"<?php  endif ?>><i class="lnr lnr-dice"></i> <span>User List</span></a>
                        </li>
                         <li>
<a href="{{ url('admin/ad_list') }}" <?php if(strpos($url, "admin/ad_list")): ?> class="active"<?php  endif ?>><i class="lnr lnr-dice"></i> <span>Ad List</span></a>
                        </li>
                        
     <li>
<a href="{{ url('admin/help') }}" <?php if(strpos($url, "admin/help")): ?> class="active"<?php  endif ?>><i class="lnr lnr-dice"></i> <span>Help</span></a>
     </li>                       
                       
                       
                    </ul>
                </nav>
            </div>
        </div>
<!-- END LEFT SIDEBAR -->

