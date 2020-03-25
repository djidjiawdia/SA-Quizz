<?php


    function getUsers(){
        $fetchJson = file_get_contents(dirname(__DIR__)."/users.json");
        return json_decode($fetchJson, true);
    }

    function searchLogin($login){
        $users = getUsers();
        foreach($users as $u){
            if(strtolower(trim($login)) === strtolower($u['login'])){
                return $u;
            }
        }
        return false;
    }

    function saveUser($nom, $prenom, $login, $password, $profil, $role){
        $users = getUsers();
        $users[] = [
            "nom" => $nom,
            "prenom" => $prenom,
            "login" => $login,
            "password" => $password,
            "profil" => $profil,
            "score" => 0,
            "role" => $role
        ];

        if(file_put_contents(dirname(__DIR__)."/users.json", json_encode($users))){
            return true;
        }else{
            return false;
        }

    }

    function getPlayers(){
        global $users;
        $players = [];
        foreach($users as $u){
            if($u['role'] === "joueur"){
                $players[] = $u;
            }
        }
        return $players;
    }