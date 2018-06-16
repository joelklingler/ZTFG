<?php
class Pages extends CI_Controller {
    public function view($page = 'Start')
    {
        if(!file_exists(APPPATH.'views/pages/main/'.$page.'.php'))
        {
            show_404();
        }
        
        
        $data = prepare_user_action_data($this->session->userdata('userdata')['actions']);

        $this->load->view('partials/header', $data);
        $this->load->view('pages/main/'.$page);
        $this->load->view('partials/footer');
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