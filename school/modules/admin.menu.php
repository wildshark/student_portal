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

        if (!isset($_COOKIE['username'])){
            $username = "Unknown User";
        }else{
            $username = $_COOKIE['username'];
        }

        if (!isset($_COOKIE['email'])){
            $email = "Email Not Found";
        }else{
            $email = $_COOKIE['email'];
        }

        echo"
            <div class='nav-link'>
                <div class='user-wrapper'>
                    <div class='profile-image'>
                        <img src='{$picture}' alt='profile image'>
                    </div>
                    <div class='text-wrapper'>
                        <p class='profile-name'>{$username}</p>
                        <div>
                            <small class='designation text-muted'>{$email}</small>
                            <span class='status-indicator online'></span>
                        </div>
                    </div>
                </div>
                <button class='btn btn-success btn-block'>New Project
                    <i class='mdi mdi-plus'></i>
                </button>
            </div>";
    }

    function dean_menu(){
        echo"
        
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=dashboard'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>Dashboard</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=administrator'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>User Account</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=student.profile'>
                    <i class='menu-icon mdi mdi-school'></i>
                    <span class='menu-title'>Student Profile</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=course'>
                    <i class='menu-icon mdi mdi-account-edit'></i>
                    <span class='menu-title'>Course </span>
                </a>
            </li>    
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=ticket'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>Ticket</span>
                </a>
            </li>
    ";

    }



    function lecturer_menu(){
        echo"
        
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=dashboard'>
                    <i class='menu-icon mdi mdi-view-dashboard'></i>
                    <span class='menu-title'>Dashboard</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#auth' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-barcode-scan'></i>
                    <span class='menu-title'>PINs Card</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='auth'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=create.pins'> Create PINs  </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=pins.list'> PINs List </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=register.account'> Register Account </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=student.index'>
                    <i class='menu-icon mdi mdi-account-key'></i>
                    <span class='menu-title'>Generate Index</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=student.profile'>
                    <i class='menu-icon mdi mdi-school'></i>
                    <span class='menu-title'>Student Profile</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#fees' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-cash'></i>
                    <span class='menu-title'>Student Fees</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='fees'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=billing'>Billing </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=payment'> Payment </a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=fees.ledger'> Fees Ledger </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class='nav-item'>
                <a class='nav-link' href='?_route=school&p=course.registration'>
                    <i class='menu-icon mdi mdi-account-edit'></i>
                    <span class='menu-title'>Course Registration </span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#hostel' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-hotel'></i>
                    <span class='menu-title'>Hostel & Booking</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='hostel'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=hostel'> Student Booking</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=hostel-block'> Create Block</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=hostel-room'> Create Room</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link' data-toggle='collapse' href='#programme-courses' aria-expanded='false' aria-controls='auth'>
                    <i class='menu-icon mdi mdi-book-open-page-variant'></i>
                    <span class='menu-title'>Programme & Courses</span>
                    <i class='menu-arrow'></i>
                </a>
                <div class='collapse' id='programme-courses'>
                    <ul class='nav flex-column sub-menu'>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=affiliate'> Affiliate School</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=faculty'> School/Faculty</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=programme'> Programme</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=course'> Course</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='?_route=school&p=add.course'> Block Course </a>
                        </li>
                    </ul>
                </div>
            </li> 
        ";
    }
}

