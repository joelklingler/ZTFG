<?php
class Action extends CI_Controller {
    public function view($actionId) {

        if(isset($actionId)) {
            // Load the action
            $this->load->database();
            $query = $this->db->query('SELECT * FROM actions WHERE id = "'.$actionId.'";');
            $action = $query->row();            
            if(isset($action)) {
                $path = 'pages/actions/'.$action->view.'.php';
                // Load data
                $data = "NODATA";
                switch($actionId) {
                    case 4:
                        // Admin-Panel
                        $usersQuery = $this->db->query('SELECT * FROM users;');
                        $rolesQuery = $this->db->query('SELECT * FROM roles;');
                        $data = array(
                            "users" => $usersQuery->result(),
                            "roles" => $rolesQuery->result()
                        );
                }
                view_with_data($path, $data, $action->minRoleLevel);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function serverState() {
        $this->load->model('server_model');
        $empyrionServer = new Server_model();
        $tttServer = new Server_model();
        $minecraftServer = new Server_model();
        $dcsServer = new Server_model();
        
        $empyrionServer->buildData("Empyrion", "5.175.26.146", 30000);
        $tttServer->buildData("G'Mod-TTT", "5.175.26.146", 27015);
        $minecraftServer->buildData("Minecraft", "5.175.26.146", 1892);
        $dcsServer->buildData("DCS-World", "5.175.26.146", 10308);

        $servers = array (
            array(
                $empyrionServer,
                $empyrionServer->isAlive()
            ),
            array(
                $tttServer,
                $tttServer->isAlive()
            ),
            array(
                $minecraftServer,
                $minecraftServer->isAlive()
            ),
            array(
                $dcsServer,
                $dcsServer->isAlive()
            )
        );
        echo json_encode($servers);
    }
}
?>