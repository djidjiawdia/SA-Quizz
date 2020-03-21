<?php

    $fetchJson = file_get_contents("../users.json");
    $users = json_decode($fetchJson, true);

    function searchLogin($login){
        global $users;
        foreach($users as $u){
            if($login === $u['login']){
                return $u;
            }
        }
        return false;
    }