 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "  SELECT `admin_menu`.`id`, `menu`
                        FROM `admin_menu` JOIN `admin_access_menu`
                        ON `admin_menu`.`id` = `admin_access_menu`.`menu_id`
                        WHERE `admin_access_menu`.`role_id` = $role_id
                        ORDER BY `admin_access_menu`.`menu_id` ASC";
            $menu = $this->db->query($queryMenu)->result_array();

            ?>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= base_url(); ?>assets/images/profile/<?= $admin['admin_image']; ?>" alt="user-img" class="img-circle"><span class="hide-menu"><?= $admin['admin_nama']; ?></span></a>

                     <ul aria-expanded="false" class="collapse">
                         <li><a href="<?= base_url('User'); ?>"><i class=" ti-user"></i> My Profile</a></li>
                         <li><a href="<?= base_url('Auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                     </ul>
                 </li>
                 <?php foreach ($menu as $m) : ?>
                     <li class="nav-small-cap ml-2"><?= $m['menu'] ?></li>
                     <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT * FROM `admin_sub_menu`
                                    WHERE `menu_id` = $menuId
                                    AND `is_active`=1";
                        $subMenu =  $this->db->query($querySubMenu)->result_array();

                        ?>

                     <?php foreach ($subMenu as $sm) : ?>
                         <?php if ($judul == $sm['title']) : ?>
                             <li class="active">
                             <?php else : ?>
                             <li>
                             <?php endif; ?>
                             <li> <a class="waves-effect waves-dark" href="<?= base_url($sm['url']); ?>" aria-expanded="false"><i class="<?= $sm['icon']; ?>"></i><span class="hide-menu"><?= $sm['title']; ?></span></a></li>

                         <?php endforeach; ?>


                     <?php endforeach; ?>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>