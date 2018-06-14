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
            $operationMessage = "Passwörter stimmen nicht überein";
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
            $_SESSION['msg'] = $operationMessage;
            $_SESSION['lastOp'] = FALSE;
            redirect('Register');
        } else {
            $operationMessage = 'Erfolgreich registriert.';
            $_SESSION['msg'] = $operationMessage;
            $_SESSION['lastOp'] = TRUE;
            redirect('Start');
        }
    }

    public function login() {
        echo "login";
    }
}
?>