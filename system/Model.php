<?php
namespace System;

use PDO;

class Model extends PDO
{
    public function __construct()
    {
        $Opt = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
        $this->Conn = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME, DBUSER, DBPASS, $Opt);
        $this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function total($Tbl, $Fld = "*", $Term = null, $OrderBy = null, $Order = null, $Limit = null, $Offset = null)
    {

        if ($Term) :
            $Term = "WHERE {$Term}";
        endif;

        if ($OrderBy) :
            $OrderBy = "ORDER BY {$OrderBy}";
        endif;

        if ($Limit) :
            $Limit = "LIMIT {$Limit}";
        endif;

        if ($Offset) :
            $Offset = "OFFSET {$Offset}";
        endif;

        $result = $this->Conn->query("SELECT {$Fld} FROM {$Tbl} {$Term} {$OrderBy} {$Order} {$Limit} {$Offset}");
        return $result->rowCount();
    }

    public function get($Tbl, $Fld = "*", $Terms = null, $OrderBy = null, $Order = null, $Limit = null, $Offset = null)
    {

        if ($Terms) :
            $Terms = "WHERE {$Terms}";
        endif;

        if ($OrderBy) :
            $OrderBy = "ORDER BY {$OrderBy}";
        endif;

        if ($Limit) :
            $Limit = "LIMIT {$Limit}";
        endif;

        if ($Offset) :
            $Offset = "OFFSET {$Offset}";
        endif;

        $result = $this->Conn->query("SELECT {$Fld} FROM {$Tbl} {$Terms} {$OrderBy} {$Order} {$Limit} {$Offset}");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
