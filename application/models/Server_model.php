<?php
class Server_model extends CI_Model {
    public $name;
    public $ip;
    public $port;

    public function buildData($nameVal, $ipVal, $portVal) {
        $this->name = $nameVal;
        $this->ip = $ipVal;
        $this->port = $portVal;
    }

    public function isAlive() {
        $returnVal = FALSE;
        if($socket =@ fsockopen($this->ip, $this->port, $errno, $errstr, 1)) {
            $returnVal = TRUE;
            fclose($socket);
        } else {
            $returnVal = FALSE;
        }
        return $returnVal;
    }
}
?>