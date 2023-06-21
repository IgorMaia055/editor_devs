<?php

namespace sistem\Database\select;

use sistem\Nucleo\Connection;

class SelectDev
{
    public function select(string $login, string $senha): array
    {
        $query = "SELECT * FROM devs WHERE `login` = '". $login ."' AND senha = '". $senha ."'";
        $result = Connection::getInstancia()->query($query)->fetchAll();
        return $result;
    }

}