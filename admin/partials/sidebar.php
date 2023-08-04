 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Dashbaord</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#batch" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-users-cog fa-sm text-white-50"></i>
             <span>Batchs</span>
         </a>
         <div id="batch" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="BatchIndex.php">All Batch</a>
                 <a class="collapse-item" href="BatchCreate.php">Create Batch</a>
             </div>
         </div>
     </li>
       <!-- Divider -->
       <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#course" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-book-reader fa-sm text-white-50"></i>
             <span>Courses</span>
         </a>
         <div id="course" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="CourseIndex.php">All Courses</a>
                 <a class="collapse-item" href="CourseCreate.php">Create Course</a>
             </div>
         </div>
     </li>
       <!-- Divider -->
       <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#student" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-book-reader fa-sm text-white-50"></i>
             <span>Student</span>
         </a>
         <div id="student" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="StudentIndex.php">All Student</a>
                 <a class="collapse-item" href="StudentCreate.php">Create Student</a>
             </div>
         </div>
     </li>
<!-- Divider -->
<hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fees" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-money-bill fa-sm text-white-50"></i>
             <span>Make payments</span>
         </a>
         <div id="fees" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="FeesIndex.php">All Student</a>
                 <a class="collapse-item" href="Feeslog.php">All Transaction</a>
             </div>
         </div>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stuff" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-book-reader fa-sm text-white-50"></i>
             <span>Stuff</span>
         </a>
         <div id="stuff" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="StuffIndex.php">All Stuff</a>
                 <a class="collapse-item" href="StuffCreate.php">Create Stuff</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">
     <li class="nav-item active">
         <a class="nav-link" href="./logout.php">
             <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->