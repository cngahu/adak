<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> POS </span>
                    </a>
                </li>
                <li>
                    <a href="#orders" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> User Management  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="nav-second-level">
                            <li>
                                <a href="">Pending Orders </a>
                            </li>

                            <li>
                                <a href="">Complete Orders </a>
                            </li>


                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Apps</li>




                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Employee Manage  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.employee') }}">All Employee</a>
                            </li>
                            <li>
                                <a href="{{ route('add.employee') }}">Add Employee </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Customer Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customer') }}">All Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('add.customer') }}">Add Customer</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Constants</li>




                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Designations  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.designation') }}">All Designations</a>
                            </li>
                            <li>
                                <a href="{{ route('add.designation') }}">Add Designation </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-gender-male-female"></i>
                        <span>Gender </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.gender') }}">All Gender</a>
                            </li>
                            <li>
                                <a href="{{ route('add.gender') }}">Add Gender</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span>Constituency </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.constituency') }}">All Constituency</a>
                            </li>
                            <li>
                                <a href="{{ route('add.constituency') }}">Add Constituency</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account"></i>
                        <span>County </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.county') }}">All County</a>
                            </li>
                            <li>
                                <a href="{{ route('add.county') }}">Add County</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi-view-dashboard"></i>
                        <span>Countries</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.nation') }}">All Country</a>
                            </li>
                            <li>
                                <a href="{{ route('add.nation') }}">Add Country</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="menu-title mt-2">Custom</li>


                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>

                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
