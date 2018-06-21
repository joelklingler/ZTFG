<?php
class User extends CI_Controller {
    public function profile($userId) {
        if(isset($userId)) {
            // Load user
            $this->load->database();
            $query = $this->db->query('SELECT * FROM users WHERE id = "'.$userId.'";');
            $user = $query->row();    
            $data = array (
                "user" => $user
            );
            view_with_data('pages/user/profile.php', $data);
        } else {
            show_404();
        }
    }

    public function view($actionId) {
        if(isset($actionId)) {
            // Load the action
            $this->load->database();
            $query = $this->db->query('SELECT * FROM actions WHERE id = "'.$actionId.'";');
            $action = $query->row();            
            if(isset($action)) {
                $path = 'pages/user/'.$action->view.'.php';
                echo $path;
                // Load data
                $data = "NODATA";
                view_with_data($path, $data, $action->minRoleLevel);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function delete($userId) {
        if(isset($userId))
        {
            // Check authorisation
            $operationMessage = "";
            $roleLevel = $this->session->userdata('userdata')['roleLevel'];
            if($roleLevel < 9999) {
                $operationMessage = "Keine Berechtigung.";
            } else {
                $this->load->database();
                $sql = "DELETE FROM users WHERE id=".$userId.";";
                if(!$this->db->query($sql))
                {
                    // TODO: Log this. Don't show to user.
                    $operationMessage = $this->db->error();
                }
            }
        } else {
            show_404();
        }

        if($operationMessage != "") {
            $op = array (
                'msg' => $operationMessage,
                'state' => '0'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        } else {
            $operationMessage = 'User wurde gelöscht.';
            $op = array (
                'msg' => $operationMessage,
                'state' => '1'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        }
    }

    public function changeRoles() {
        // Check authorisation
        $operationMessage = "";
        $roleLevel = $this->session->userdata('userdata')['roleLevel'];
        if($roleLevel < 9999) {
            $operationMessage = "Keine Berechtigung.";
        } else {
            $userRolePairs = json_decode($_POST["userRolePairs"]);
            $sqlQueries = array();
            foreach($userRolePairs as $pair) {
                $sql = "UPDATE users SET roleId=".$pair->roleValue." WHERE id=".$pair->userId.";";
                array_push($sqlQueries, $sql);
            }
            $this->load->database();
            print_r($sqlQueries);
            foreach($sqlQueries as $query) {
                $this->db->query($query);
                // Error may happen here that is not displayed to the user.
            }
        }

        if($operationMessage != "") {
            $op = array (
                'msg' => $operationMessage,
                'state' => '0'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        } else {
            $operationMessage = 'Rollen wurden angepasst.';
            $op = array (
                'msg' => $operationMessage,
                'state' => '1'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        }
    }

    public function changepw() {
        $userId = $this->session->userdata('userdata')['id'];
        $pwOld = $_POST["pw_old"];
        $pwNew1 = $_POST["pw_new1"];
        $pwNew2 = $_POST["pw_new2"];

        $operationMessage = "";

        // Check if passwords match
        if($pwNew1 != $pwNew2) {
            $operationMessage = "Passwörter stimmen nicht überein.";
        } else {
            // Check if old password is correct
            // Load matching user
            $this->load->database();
            $query = $this->db->query('SELECT * FROM users WHERE id = "'.$userId.'";');
            $user = $query->row();
            if(!isset($user))
            {
                $operationMessage = "Interner Fehler. (UserId does not exist.)";
            } else {
                // Check password
                if(!password_verify($pwOld, $user->passwordhash)) {
                    $operationMessage = "Das alte Passwort ist nicht korrekt.";
                } else {
                    // Change password
                    $sql_query = "UPDATE users SET passwordhash='".password_hash($pwNew1, PASSWORD_DEFAULT)."' WHERE id=".$userId.";";
                    if(!$this->db->query($sql_query))
                    {
                        // TODO: Log this. Don't show to user.
                        $operationMessage = $this->db->error();
                    }
                }
            }
        }

        if($operationMessage != "") {
            $op = array (
                'msg' => $operationMessage,
                'state' => '0'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        } else {
            $operationMessage = 'Passwort wurde geändert.';
            $op = array (
                'msg' => $operationMessage,
                'state' => '1'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect($this->agent->referrer());
        }
    }
}
?>