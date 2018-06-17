<?php
class Action extends CI_Controller {
    public function view($actionId) {

        if(isset($actionId)) {
            // Load the action
            $this->load->database();
            $query = $this->db->query('SELECT * FROM actions WHERE id = "'.$actionId.'";');
            $action = $query->row();            
            if(isset($action)) {
                $path = 'pages/actions/'.$action->action.'.php';
                view($path, $action->minRoleLevel);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
}
?>