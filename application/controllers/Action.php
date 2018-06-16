<?php
class Action extends CI_Controller {
    public function account() {
        redirect($this->agent->referrer());
    }

    public function admin() {
        redirect($this->agent->referrer());
    }

    public function dayz_codes() {
        redirect($this->agent->referrer());
    }

    public function server() {
        redirect($this->agent->referrer());
    }
}
?>