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
                if (count($parts) > 1) {
                    $ControllerPart = $parts[0].'Controller';
                    $namespace = ucfirst($parts[0]) . '\\';
                } else {
                    $ControllerPart = ucfirst($parts[0].'Controller');
                    $namespace = '';
                }
                
                unset($parts[0]);

                if (isset($parts[1])) :
                    $ControllerPart = $parts[1]."Controller";
                    unset($parts[1]);
                endif;

                if (isset($url_params[1])) :
                    $MethodPart = $url_params[1];
                    unset($url_params[1]);
                endif;

                if (count($parts) > 0) :
                    $params = implode(",", $parts);
                    unset($parts);
                endif;
            endif;

            $ControllerPart = CONTROLLER_NAMESPACE . $namespace  . ucfirst($ControllerPart);

            if (class_exists($ControllerPart)) {
                $Controller = new $ControllerPart;
                if (method_exists($Controller, $MethodPart)) :
                    $Controller->$MethodPart($url_params, $params);
                else :
                    trigger_error("Controller {$MethodPart} not found!", E_USER_ERROR);
                endif;
            } else {
                trigger_error("Route {$ControllerPart} not found!", E_USER_ERROR);
            }
        else :
            $Controller = CONTROLLER_NAMESPACE.$ControllerPart;
            $Controller = new $Controller();
            call_user_func(array($Controller, DEFAULT_ACTION));
        endif;
    }
}
