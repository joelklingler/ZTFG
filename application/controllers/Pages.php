<?php
class Pages extends CI_Controller {
    public function view($page = 'Start')
    {
        $path = 'pages/main/'.$page.'.php';
        if($page == "Account_mobile") {
            view_with_data($path, prepare_user_action_data($this->session->userdata('userdata')['actions']));
        } else {
            view($path);
        }
    }

    public function viewOld($page = 'Start')
    {
        if(!file_exists(APPPATH.'views/pages/oldFiles/'.$page.'.html'))
        {
            show_404();
        }
        $this->load->view('pages/oldFiles/'.$page.'.html');
    }
}
?>