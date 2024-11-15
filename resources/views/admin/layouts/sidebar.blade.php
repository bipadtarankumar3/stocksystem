<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-semibold ms-2">
                <!--<img src="{{URL::to('public/assets/admin/img/logo/logo.jpg')}}" alt="" height="50px" width="170px">-->
                </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-24px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item active">
            <a href="{{URL::to('admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{URL::to('admin/user/list')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div>Customers</div>
            </a>


        </li>


        {{-- <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="mdi mdi-map-marker-radius  mdi-24px"></i>
                <div>Products</div>
            </a>
            <ul class="menu-sub">



                <li class="menu-item ">
                    <a href="{{URL::to('admin/location/category/list')}}" class="menu-link">
                        
                        <div>Location Category</div>
                    </a>


                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/location/list')}}" class="menu-link">
                        <div>Location</div>
                    </a>


                </li>
                
            </ul>
        </li> --}}

        <li class="menu-item ">
            <a href="{{URL::To('admin/category/list')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>Categories</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{URL::To('admin/warehouse/list')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>Warehouse</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{URL::To('admin/sd/list')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>SD</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{URL::To('admin/uom/list')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>UOM</div>
            </a>
        </li>

        <li class="menu-item ">
            <a href="{{URL::To('admin/product/list')}}" class="menu-link">
                <span class="mdi mdi-emoticon  mdi-24px"></span>
                <div>Items Master</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{URL::To('admin/product/quantity')}}" class="menu-link">
                <span class="mdi mdi-counter  mdi-24px"></span>
                <div>Manage Stock</div>
            </a>
        </li>

  <li class="menu-item ">
            <a href="{{URL::To('admin/cartoon/list')}}" class="menu-link">
                <span class="mdi mdi-counter  mdi-24px"></span>
                <div>Manage Cartoons</div>
            </a>
        </li>
        
         <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="mdi mdi-map-marker-radius  mdi-24px"></i>
                <div>Manage Requirements</div>
            </a>
            <ul class="menu-sub">



                <li class="menu-item ">
                    <a href="{{URL::to('admin/requerment/condition')}}" class="menu-link">
                        
                        <div>Requirements condition</div>
                    </a>


                </li>
                <li class="menu-item ">
                    <a href="{{URL::to('admin/requerment/list')}}" class="menu-link">
                        <div>Requirements list</div>
                    </a>


                </li>
                
            </ul>
        </li> 


        <li class="menu-item ">
            <a href="{{URL::To('admin/billing/add')}}" class="menu-link">
                <span class="mdi mdi-file-chart  mdi-24px"></span>
                <div>Billing Management</div>
            </a>


        </li>

        <!--<li class="menu-item ">-->
        <!--    <a href="javascript:void(0);" class="menu-link menu-toggle">-->
        <!--        <span class="mdi mdi-cog  mdi-24px"></span>-->
        <!--        <div>Settings</div>-->
        <!--    </a>-->


        <!--    <ul class="menu-sub">-->

        <!--        <li class="menu-item ">-->
        <!--            <a href="{{URL::To('admin/profile')}}" class="menu-link">-->
        <!--                <div>Profile</div>-->
        <!--            </a>-->


        <!--        </li>-->
               
        <!--    </ul>-->
        <!--</li>-->



    </ul>

</aside>
