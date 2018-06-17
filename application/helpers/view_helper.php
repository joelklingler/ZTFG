<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('view()'))
{
    function view($path, $minRoleLevel=0) {
        $CI = &get_instance();

        if(!file_exists(APPPATH.'views/'.$path)) {
            show_404();
        }        
        
        $data = prepare_user_action_data($CI->session->userdata('userdata')['actions']);

        $CI->load->view('partials/header', $data);
        if(!$CI->session->has_userdata('userdata') && $CI->session->userdata('userdata')['roleLevel'] < $minRoleLevel)
        {
            $CI->load->view('pages/main/security_error');    
        } else {
            $CI->load->view($path);
        }
        $CI->load->view('partials/footer');
    }
}


?>