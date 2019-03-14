<?php

class Model extends PDO {

    public function __construct() {
        $Options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
        $this->Conn = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DBNAME, DBUSER, DBPASS, $Options);
        $this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function total($Table, $Columns = "*", $Terms = null, $OrderBy = null, $Order = null, $Limit = null, $Offset = null) {

        if ($Terms):
            $Terms = "WHERE {$Terms}";
        endif;

        if ($OrderBy):
            $OrderBy = "ORDER BY {$OrderBy}";
        endif;

        if ($Limit):
            $Limit = "LIMIT {$Limit}";
        endif;

        if ($Offset):
            $Offset = "OFFSET {$Offset}";
        endif;

        $result = $this->Conn->query("SELECT {$Columns} FROM {$Table} {$Terms} {$OrderBy} {$Order} {$Limit} {$Offset}");
        return $result->rowCount();
    }

    public function get($Table, $Columns = "*", $Terms = null, $OrderBy = null, $Order = null, $Limit = null, $Offset = null) {

        if ($Terms):
            $Terms = "WHERE {$Terms}";
        endif;

        if ($OrderBy):
            $OrderBy = "ORDER BY {$OrderBy}";
        endif;

        if ($Limit):
            $Limit = "LIMIT {$Limit}";
        endif;

        if ($Offset):
            $Offset = "OFFSET {$Offset}";
        endif;

        $result = $this->Conn->query("SELECT {$Columns} FROM {$Table} {$Terms} {$OrderBy} {$Order} {$Limit} {$Offset}");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
