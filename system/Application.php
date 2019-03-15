<?php

namespace System;

class Application
{
    public function startup()
    {
        $url = strip_tags(trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_URL)));
        $url = rtrim($url, "/");

        $MethodPart = DEFAULT_ACTION;
        $ControllerPart = DEFAULT_CONTROLLER;

        if (!empty($url)) :
            $parts = explode("/", $url);
            $params = array();

            $url_params = explode("&", $_SERVER['QUERY_STRING']);
            unset($url_params[0]);

            if (isset($parts[0])) :
                $ControllerPart = $parts[0]."Controller";

                if (isset($parts[1])) :
                    $MethodPart = $parts[1];
                endif;

                unset($parts[0]);
                unset($parts[1]);

                if (count($parts) > 0) :
                    $params = implode(",", $parts);
                    unset($parts);
                endif;
            endif;

            $ControllerPart = CONTROLLER_NAMESPACE.$ControllerPart;
            $Controller = new $ControllerPart;

            if (method_exists($Controller, $MethodPart)) :
                $Controller->$MethodPart($url_params, $params);
            else :
                trigger_error("Controller {$MethodPart} não encontrado!", E_USER_ERROR);
            endif;
        else :
            $Controller = CONTROLLER_NAMESPACE.$ControllerPart;
            $Controller = new $Controller();
            call_user_func(array($Controller, DEFAULT_ACTION));
        endif;
    }
}
