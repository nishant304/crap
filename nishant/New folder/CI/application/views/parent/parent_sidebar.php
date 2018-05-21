<?php  $parent_sidebar=$this->session->userdata('parent_sidebar');
?>

<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" style="background: <?php echo $parent_sidebar;?>;">
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?php echo base_url(); ?>index.php/parent_controller/dashboard" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>index.php/parent_controller/student_leave_parent" class="active"><i class="fa fa-home nav_icon"></i>Request For Leave</a>
						</li>
						
					</ul>	
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>