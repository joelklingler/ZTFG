<?php
class Account extends CI_Controller {
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

    public function register() {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pw1 = $_POST["password1"];
        $pw2 = $_POST["password2"];

        $operationMessage = "";

        // Check if passwords match
        if($pw1 != $pw2) {
            $operationMessage = "Passwörter stimmen nicht überein.";
        } else {
            // Check if E-Mail already exists
            $this->load->database();
            $query = $this->db->query('SELECT * FROM users WHERE email = "'.$email.'";');
            if($query->num_rows() != 0)
            {
                $operationMessage = "Es existiert bereits ein User mit dieser E-Mail-Adresse. Passwort vergessen?";
            } else {
                // Register User
                $sql_query = "INSERT INTO users (username, email, passwordhash, timeStampRegistered) VALUES('".$username."','".$email."','".password_hash($pw1, PASSWORD_DEFAULT)."','".date("Y-m-d H:i:s")."');";
                if(!$this->db->query($sql_query))
                {
                    // TODO: Log this. Don't show to user.
                    $operationMessage = $this->db->error();
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
            redirect('Register');
        } else {
            $operationMessage = 'Erfolgreich registriert. Du kannst dich jetzt einloggen.';
            $op = array (
                'msg' => $operationMessage,
                'state' => '1'
            );
            $_SESSION['opState'] = $op;
            $this->session->mark_as_flash('opState');
            redirect('Start');
        }
    }

    public function logout() {
        $this->session->unset_userdata('userdata');
        $operationMessage = "Erfolgreich ausgeloggt.";
        $op = array (
            'msg' => $operationMessage,
            'state' => '1'
        );
        $_SESSION['opState'] = $op;
        $this->session->mark_as_flash('opState');
        redirect('Start');
    }

    public function login() {
        $email = $_POST["email"];
        $pw = $_POST["password"];

        $operationMessage = "";

        // Load matching user
        $this->load->database();
        $query = $this->db->query('SELECT * FROM users WHERE email = "'.$email.'";');
        $user = $query->row();
        if(!isset($user))
        {
            $operationMessage = "Inkorrekte Daten eingegeben.";
        } else {
            // Check password
            if(!password_verify($pw, $user->passwordhash)) {
                $operationMessage = "Inkorrekte Daten eingegeben.";
            } else {
                // Set lastLogin timestamp
                $sql_query = "UPDATE users SET timeStampLastLogin = '".date("Y-m-d H:i:s")."' WHERE id = ".$user->id.";";
                if(!$this->db->query($sql_query))
                {
                    // TODO: Log this. Don't show to user.
                    $operationMessage = $this->db->error();
                } else {
                    // Load roles
                    $roles = $this->db->query("SELECT * FROM userRoles WHERE idUser=".$user->id." ORDER BY idRole DESC;")->result();
                    $userRoleId = 1;
                    $userRoleLevel = 1;
                    $userRoleName = "User";
                    $actions = array();
                    if(!empty($roles))
                    {
                        // Get highest role
                        $userRoleId = $roles[0]->idRole;
                    }
                    // Get role information
                    $roleInfo = $this->db->query("SELECT * FROM roles WHERE id=".$userRoleId.";")->row();
                    if(!isset($roleInfo))
                    {
                        $operationMessage = "Interner Fehler (userRoles).";
                    } else {
                        $userRoleName = $roleInfo->name;
                        $userRoleLevel = $roleInfo->level;
                        // Get actions
                        $actions = $this->db->query("SELECT name, id FROM actions WHERE minRoleLevel <= ".$userRoleLevel." ORDER BY minrolelevel ASC;")->result_array();
                    }
                    

                    // Set session
                    $userSession = array (
                        'id' => $user->id,
                        'roleName' => $userRoleName,
                        'roleLevel' => $userRoleLevel,
                        'username' => $user->username,
                        'usermail' => $user->email,
                        'actions' => $actions                        
                    );

                    $this->session->set_userdata('userdata', $userSession);
                    $this->session->mark_as_temp('userdata', 3600);
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
            $operationMessage = "Erfolgreich eingeloggt. Willkommen ".$user->username.".";
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