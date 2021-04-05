<?php

function check_login() // function, check has been login or not
{
    $ci = get_instance(); // instance object to ci_controller
    if (!$ci->session->userdata('username')) {
        redirect('Auth/Login');
    }
}