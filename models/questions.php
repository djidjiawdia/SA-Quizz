<?php

    $fetchJson = file_get_contents(dirname(__DIR__)."/questions.json");
    $questions = json_decode($fetchJson, true);

    function saveQuestion($post){
        global $questions;

        $questions[] = $post;

        if(file_put_contents(dirname(__DIR__)."/questions.json", json_encode($questions))){
            return true;
        }else{
            return false;
        }
    }