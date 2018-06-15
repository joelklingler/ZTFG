<?php
class Account extends CI_Controller {
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
                $sql_query = "UPDATE users  SET timeStampLastLogin = '".date("Y-m-d H:i:s")."' WHERE id = ".$user->id.";";
                if(!$this->db->query($sql_query))
                {
                    // TODO: Log this. Don't show to user.
                    $operationMessage = $this->db->error();
                } else {
                    // Set session
                    $userSession = array (
                        'id' => $user->id,
                        'roleId' => 1,
                        'username' => $user->username                        
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
            //$operationMessage = $this->session->userdata('userdata')['username'];
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