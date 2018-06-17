<?php
class Pages extends CI_Controller {
    public function view($page = 'Start')
    {
        $path = 'pages/main/'.$page.'.php';
        view($path);
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