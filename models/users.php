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

    function changeScore($login, $score){
        $newTabusers = [];
        $users = getUsers();
        foreach($users as $u){
            if(strtolower(trim($login)) === strtolower($u['login'])){
                $u['score'] = $score;
            }
            $newTabusers[] = $u; 
        }
        if(file_put_contents(dirname(__DIR__)."/users.json", json_encode($newTabusers))){
            return true;
        }else{
            return false;
        }
    }

    function getPlayers(){
        $users = getUsers();
        $players = [];
        foreach($users as $u){
            if($u['role'] === "joueur"){
                $players[] = $u;
            }
        }
        return $players;
    }

    function topScores(){
        $players = getPlayers();
        for($i=0; $i<sizeof($players); $i++){
            for($j=$i+1; $j<sizeof($players); $j++){
                if((int)$players[$i]['score'] < (int)$players[$j]['score']){
                    $svg = $players[$i];
                    $players[$i] = $players[$j];
                    $players[$j] = $svg;
                }
            }
        }
        $n = (sizeof($players) < 5)?sizeof($players):5;
        return array_slice($players, 0, $n);
    }