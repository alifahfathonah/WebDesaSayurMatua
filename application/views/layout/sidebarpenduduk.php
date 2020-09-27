 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">

         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= base_url(); ?>assets/images/profile/default.jpg ?>" alt="user-img" class="img-circle"><span class="hide-menu"><?= $penduduk['Nama']; ?></span></a>

                     <ul aria-expanded="false" class="collapse">
                         <li><a href="<?= base_url('Penduduk/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                     </ul>
                 </li>
                 <li class="nav-small-cap ml-2">Admin</li>
                 <li> <a class="waves-effect waves-dark" href="<?= base_url('Penduduk/Beranda'); ?>" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Beranda</span></a></li>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>