<?php

namespace System;

class Url
{
    public function href($route, $params = false)
    {
        if ($params) {
            return BASE . '/index.php?action=' . $route . '&' . $params;
        } else {
            return BASE . '/index.php?action=' . $route;
        }
    }
}
