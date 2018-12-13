<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 3:57 PM
 */

class stuSideMenu{

    function nav_student_profile(){

        if(isset($_USER['picture']) and !empty($_USER['picture'])){
            $picture = $_USER['picture'];
        }else{
            $picture ="asset/images/faces/face1.jpg";
        }

        echo"
            <div class='nav-link'>
                <div class='user-wrapper'>
                    <div class='profile-image'>
                        <img src='{$picture}' alt='profile image'>
                    </div>
                    <div class='text-wrapper'>
                        <p class='profile-name'>{$_COOKIE['username']}</p>
                        <div>
                            <small class='designation text-muted'>{$_COOKIE['email']}</small>
                            <span class='status-indicator online'></span>
                        </div>
                    </div>
                </div>
                <button class='btn btn-success btn-block'>New Project
                    <i class='mdi mdi-plus'></i>
                </button>
            </div>";
    }

    function menu_activated(){
        echo"
        
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=dashboard'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>Dashboard</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#auth' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-restart'></i>
                    <span class='menu-title'>PINs Card</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='auth'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=create.pins'> Create PINs  </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=pins.list'> PINs List </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=register.account'> Register Account </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#fees' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-restart'></i>
                    <span class='menu-title'>Student Fees</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='fees'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=create.pins'>Billing </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=pins.list'> Payment </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=admin&p=register.account'> Fees Ledger </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=matriculation.form'>
                    <i class='menu-icon mdi mdi-school'></i>
                    <span class='menu-title'>Matriculation Form</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=hostel'>
                    <i class='menu-icon mdi mdi-hotel'></i>
                    <span class='menu-title'>Hostel</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=semester.timetable'>
                    <i class='menu-icon mdi mdi-calendar-check'></i>
                    <span class='menu-title'>Semester Timetable</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=graduation.registration'>
                    <i class='menu-icon mdi mdi-trophy-variant'></i>
                    <span class='menu-title'>Graduation Registration</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=result'>
                    <i class='menu-icon mdi mdi-receipt'></i>
                    <span class='menu-title'>Result</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#auth' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-restart'></i>
                    <span class='menu-title'>User Pages</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='auth'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/blank-page.html'> Blank Page </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/login.html'> Login </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/register.html'> Register </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/error-404.html'> 404 </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/error-500.html'> 500 </a>
                        </li>
                    </ul>
                </div>
            </li>
    ";

    }
    function student_menu_not_activated(){

        return"
        
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=dashboard'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>Dashboard</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=fees.history'>
                    <i class='menu-icon mdi mdi-cash-multiple'></i>
                    <span class='menu-title'>Fees Statement</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=matriculation.form'>
                    <i class='menu-icon mdi mdi-school'></i>
                    <span class='menu-title'>Matriculation Form</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=hostel'>
                    <i class='menu-icon mdi mdi-hotel'></i>
                    <span class='menu-title'>Hostel</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=semester.timetable'>
                    <i class='menu-icon mdi mdi-calendar-check'></i>
                    <span class='menu-title'>Semester Timetable</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=graduation.registration'>
                    <i class='menu-icon mdi mdi-trophy-variant'></i>
                    <span class='menu-title'>Graduation Registration</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=student&p=result'>
                    <i class='menu-icon mdi mdi-receipt'></i>
                    <span class='menu-title'>Result</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#auth' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-restart'></i>
                    <span class='menu-title'>User Pages</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='auth'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/blank-page.html'> Blank Page </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/login.html'> Login </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/register.html'> Register </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/error-404.html'> 404 </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pages/samples/error-500.html'> 500 </a>
                        </li>
                    </ul>
                </div>
            </li>
    ";

    }
}
