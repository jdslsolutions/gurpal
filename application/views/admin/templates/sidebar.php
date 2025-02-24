<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  
  <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('admin')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><?=keyword_value('dashboard','Dashboard')?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
			<?php if($this->session->user_type=='superadmin') { ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span><?=keyword_value('masters','Masters')?></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=base_url('admin/brands')?>"><?=keyword_value('brands','Brands')?></a>
                        <!-- <a class="collapse-item" href="<?=base_url('admin/colors')?>"><?=keyword_value('color','Color')?></a> -->
						<a class="collapse-item" href="<?=base_url('admin/states')?>"><?=keyword_value('states','States')?></a>
						<a class="collapse-item" href="<?=base_url('admin/cities')?>"><?=keyword_value('cities','Cities')?></a>
						<a class="collapse-item" href="<?=base_url('admin/gst')?>"><?=keyword_value('gst','Gst')?></a>
                        
                    </div>
                </div>
            </li>
			<?php }	 ?>
			
			<li class="nav-item">
                <a class="nav-link " href="<?=base_url('admin/products')?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span><?=keyword_value('products','Products')?></span>
                </a>
               
            </li>
			
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
        </ul>
        <!-- End of Sidebar -->