
   <!-- ========== Left Sidebar Start ========== -->
   <div class="left-side-menu">

       <div class="slimscroll-menu">

           <!--- Sidemenu -->
           <div id="sidebar-menu">

               <ul class="metismenu" id="side-menu">

                   <li class="menu-title">Navigation</li>

                   <li>
                       <a href="{{url('/home')}}" class="waves-effect">
                           <i class="remixicon-dashboard-line"></i>
                           <span> Dashboard </span>
                       </a>
                   </li>
                    {{-- @can('all')
                           <li>
                               <a href="dashboard-2">Dashboard 2</a>
                           </li>
                           @endcan --}}
                   <li class="{{ request()->is('customers/*') 
                                || request()->is('cases/*')
                                || request()->is('currency/*') ? 'mm-active' : '' }}">
                       <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                           <i class="remixicon-folder-add-line"></i>
                           <span>Currency</span>
                           <span class="menu-arrow"></span>
                       </a>
                       <ul class="nav-second-level nav" aria-expanded="false">
                           <li>
                               <a href="{{url('/customers')}}" class="waves-effect {{ request()->is('customers/*') ? 'active' : '' }}">
                                    <span>Customers</span>
                               </a>
                           </li>
                           <li>
                                <a href="{{url('/cases')}}" class="waves-effect {{ request()->is('cases/*') ? 'active' : '' }}">
                                    <span>Case</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/currency')}}" class="waves-effect">
                                    <span>Currency</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/transaction')}}" class="waves-effect">
                                    <span>Transaction</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/profit')}}" class="waves-effect">
                                    <span>Profit</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/history')}}" class="waves-effect">
                                    <span>History</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li> --}}
                       </ul>
                   </li>
               </ul>

           </div>
           <!-- End Sidebar -->

           <div class="clearfix"></div>

       </div>
       <!-- Sidebar -left -->

   </div>
   <!-- Left Sidebar End -->