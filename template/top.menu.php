<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/11/2018
 * Time: 10:34 PM
 * https://cdn.materialdesignicons.com/1.1.34/
 */

class top_menu{

    function student_menu(){
        echo"
            <span class='profile-text'>Hello, {$_SESSION['student_name']} !</span>
            <img class='img-xs rounded-circle' src='asset/images/faces/face.png' alt='Profile image'>
            ";
    }

    function profile_menu(){
        echo"
        <a class='dropdown-item p-0'>
            <div class='d-flex border-bottom'>
                <div class='py-3 px-4 d-flex align-items-center justify-content-center'>
                    <i class='mdi mdi-bookmark-plus-outline mr-0 text-gray'></i>
                </div>
                <div class='py-3 px-4 d-flex align-items-center justify-content-center border-left border-right'>
                    <i class='mdi mdi-account-outline mr-0 text-gray'></i>
                </div>
                <div class='py-3 px-4 d-flex align-items-center justify-content-center'>
                    <i class='mdi mdi-alarm-check mr-0 text-gray'></i>
                </div>
            </div>
        </a>
        <a class='dropdown-item mt-2'>Manage Accounts</a>
        <a class='dropdown-item'>Change Password</a>
        <a class='dropdown-item'>Check Inbox</a>
        <a class='dropdown-item'>Sign Out</a>
        ";
    }

    function notification(){
        echo"
            <div class='dropdown-divider'></div>
            <a class='dropdown-item preview-item'>
                <div class='preview-thumbnail'>
                    <div class='preview-icon bg-success'>
                        <i class='mdi mdi-alert-circle-outline mx-0'></i>
                    </div>
                </div>
                <div class='preview-item-content'>
                    <h6 class='preview-subject font-weight-medium text-dark'>Application Error</h6>
                    <p class='font-weight-light small-text'>
                        Just now
                    </p>
                </div>
            </a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item preview-item'>
                <div class='preview-thumbnail'>
                    <div class='preview-icon bg-warning'>
                        <i class='mdi mdi-comment-text-outline mx-0'></i>
                    </div>
                </div>
                <div class='preview-item-content'>
                    <h6 class='preview-subject font-weight-medium text-dark'>Settings</h6>
                    <p class='font-weight-light small-text'>
                        Private message
                    </p>
                </div>
            </a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item preview-item'>
                <div class='preview-thumbnail'>
                    <div class='preview-icon bg-info'>
                        <i class='mdi mdi-email-outline mx-0'></i>
                    </div>
                </div>
                <div class='preview-item-content'>
                    <h6 class='preview-subject font-weight-medium text-dark'>New user registration</h6>
                    <p class='font-weight-light small-text'>
                        2 days ago
                    </p>
                </div>
            </a>
            ";
    }

    function email(){

    }
}
?>


echo
<div class='dropdown-item'>
    <p class='mb-0 font-weight-normal float-left'>You have 7 unread mails
    </p>
    <span class='badge badge-info badge-pill float-right'>View all</span>
</div>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
    <div class='preview-thumbnail'>
        <img src='images/faces/face4.jpg' alt='image' class='profile-pic'>
    </div>
    <div class='preview-item-content flex-grow'>
        <h6 class='preview-subject ellipsis font-weight-medium text-dark'>David Grey
            <span class='float-right font-weight-light small-text'>1 Minutes ago</span>
        </h6>
        <p class='font-weight-light small-text'>
            The meeting is cancelled
        </p>
    </div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
    <div class='preview-thumbnail'>
        <img src='images/faces/face2.jpg' alt='image' class='profile-pic'>
    </div>
    <div class='preview-item-content flex-grow'>
        <h6 class='preview-subject ellipsis font-weight-medium text-dark'>Tim Cook
            <span class='float-right font-weight-light small-text'>15 Minutes ago</span>
        </h6>
        <p class='font-weight-light small-text'>
            New product launch
        </p>
    </div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
    <div class='preview-thumbnail'>
        <img src='images/faces/face3.jpg' alt='image' class='profile-pic'>
    </div>
    <div class='preview-item-content flex-grow'>
        <h6 class='preview-subject ellipsis font-weight-medium text-dark'> Johnson
            <span class='float-right font-weight-light small-text'>18 Minutes ago</span>
        </h6>
        <p class='font-weight-light small-text'>
            Upcoming board meeting
        </p>
    </div>
</a>

