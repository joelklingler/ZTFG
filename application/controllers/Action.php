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

    public function serverState() {
        $this->load->model('server');
        $empyrionServer = new Server();
        $tttServer = new Server();
        $minecraftServer = new Server();
        
        $empyrionServer->buildData("Empyrion", "5.175.26.146", 30000);
        $tttServer->buildData("ZTFG-TTT-Server-GER", "5.175.26.146", 27015);
        $minecraftServer->buildData("Minecraft", "5.175.26.146", 1892);

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
            )
        );
        echo json_encode($servers);
    }
}
?>