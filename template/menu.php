<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 11:43 PM
 */
if(isset($_USER['picture']) and !empty($_USER['picture'])){
    $picture = $_USER['picture'];
}else{
    $picture ="asset/images/faces/face1.jpg";
}

?>
<li class="nav-item nav-profile">
    <div class="nav-link">
        <div class="user-wrapper">
            <div class="profile-image">
                <img src="<?php echo $picture;?>" alt="profile image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name"><?php echo $_SESSION['student_name'];?></p>
                <div>
                    <small class="designation text-muted"><?php echo $_SESSION['student_index'];?></small>
                    <span class="status-indicator online"></span>
                </div>
            </div>
        </div>
        <button class="btn btn-success btn-block">New Project
            <i class="mdi mdi-plus"></i>
        </button>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="?_route=student&p=dashboard">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="menu-icon mdi mdi-backup-restore"></i>
        <span class="menu-title">Fees Statement</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/charts/chartjs.html">
        <i class="menu-icon mdi mdi-chart-line"></i>
        <span class="menu-title">Matriculation Form</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="menu-icon mdi mdi-table"></i>
        <span class="menu-title">Hostel</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/icons/font-awesome.html">
        <i class="menu-icon mdi mdi-sticker"></i>
        <span class="menu-title">Semester Timetable</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/icons/font-awesome.html">
        <i class="menu-icon mdi mdi-sticker"></i>
        <span class="menu-title">Graduation Registration</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pages/icons/font-awesome.html">
        <i class="menu-icon mdi mdi-sticker"></i>
        <span class="menu-title">Result</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/samples/login.html"> Login </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/samples/register.html"> Register </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
            </li>
        </ul>
    </div>
</li>
