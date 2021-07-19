<header class="topbar" data-navbarbg="skin6">

    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand" style="padding: 0 15px;">
                <!-- Logo icon -->
                <a href="<?= base_url()?>/admin" style="width: 100%;margin-top: 20px;vertical-align: middle;">
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text text-dark font-weight-bold" >
						<!-- dark Logo text -->
						ADMIN PAGE
                            </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto ml-3 pl-1">


            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                       type="search" placeholder="Search" aria-label="Search">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

						<?php if ($this->session->userdata('photo_path') !== null) { ?>
							<img src="<?php echo $this->session->userdata('photo_path') ?>" id="profileatas" alt="user" class="rounded-circle"
								 width="40"
								 style="
                                        width: 40px;
                                        height: 40px;
                                        max-width:40px;
                                        max-height:40px;
                                        object-fit:scale-down;
                                        border-radius:50% 50% 50% 50%;
                                        ">
						<?php }else{ ?>
							<img src="<?php echo base_url() . 'assets/admin/assets/images/users/1.jpg'?>" id="profileatas" alt="user" class="rounded-circle"
								 width="40"
								 style="
                                        width: 40px;
                                        height: 40px;
                                        max-width:40px;
                                        max-height:40px;
                                        object-fit:scale-down;
                                        border-radius:50% 50% 50% 50%;
                                        ">
						<?php } ?>



                        <span class="ml-2 d-none d-lg-inline-block"><span
                                class="text-dark"><?= $this->session->userdata('fullname')?></span> <i data-feather="chevron-down"
                                                                      class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="<?php echo base_url().'auth/logout'?>"><i data-feather="power"
                                                                              class="svg-icon mr-2 ml-1"></i>
                            Logout</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
