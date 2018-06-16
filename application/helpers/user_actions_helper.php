<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('prepare_user_action_data()'))
{
    function prepare_user_action_data($actionData) {
        $actions = array (
            "data" => $actionData
        );
        $account = array (
            "actions" => $actions
        );
        $data['account'] = $account;
        return $data;
    }
}


?>