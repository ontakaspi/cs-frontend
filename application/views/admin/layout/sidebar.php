<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item <?php if(strtolower($title) == 'admin home'){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($title) == 'admin home'){ echo "active";}?> " href="<?php echo base_url().'admin'?>"
                                             aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Master</span></li>
				<li class="sidebar-item <?php if(strtolower($this->uri->segment('1')) == 'size_chart' ){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($this->uri->segment('1')) == 'size_chart' ){ echo "active";}?> " href="<?php echo base_url().'size_chart'?>" aria-expanded="false"><i class="fas fa-list"></i><span
							class="hide-menu">Master Ukuran Baju</span></a></li>
				<li class="sidebar-item <?php if(strtolower($this->uri->segment('1')) == 'client_data'){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($this->uri->segment('1')) == 'client_data'){ echo "active";}?> " href="<?php echo base_url().'Client_data/'?>" aria-expanded="false"><i class=" fas fa-address-card"></i><span
							class="hide-menu">Master client</span></a></li>
				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Data</span></li>
				<li class="sidebar-item <?php if(strtolower($this->uri->segment('1')) == 'client_cloth_size'){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($this->uri->segment('1')) == 'client_cloth_size'){ echo "active";}?> " href="<?php echo base_url().'client_cloth_size/'?>" aria-expanded="false"><i class="fas fa-th-large"></i><span
							class="hide-menu">Ukuran baju <br>client</span></a></li>
				<li class="list-divider"></li>
				<li class="nav-small-cap"><span class="hide-menu">Users</span></li>
				<?php if ($this->session->userdata('roles') == 'admin') {?>
					<li class="sidebar-item <?php if(strtolower($this->uri->segment('1')) == 'users' && $this->uri->segment('3') !== 'profile'){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($this->uri->segment('1')) == 'users' && $this->uri->segment('3') !== 'profile'){ echo "active";}?> " href="<?php echo base_url().'users/'?>" aria-expanded="false"><i class="fas fa-user-plus"></i><span
								class="hide-menu">List Users</span></a></li>
				<?php } ?>
				<li class="sidebar-item <?php if(strtolower($this->uri->segment('3')) == 'profile'){ echo "selected";}?> "> <a class="sidebar-link sidebar-link <?php if(strtolower($this->uri->segment('3')) == 'profile'){ echo "active";}?> " href="<?php echo base_url().'users/index/profile'?>" aria-expanded="false"><i class=" fas fa-user"></i><span
							class="hide-menu">Profile</span></a></li>

			</ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
