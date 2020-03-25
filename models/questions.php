<?php

    function getQuestions(){
        $fetchJson = file_get_contents(dirname(__DIR__)."/questions.json");
        return json_decode($fetchJson, true);
    }

    function saveQuestion($post){
        $questions = getQuestions();

        $questions[] = $post;

        if(file_put_contents(dirname(__DIR__)."/questions.json", json_encode($questions))){
            return true;
        }else{
            return false;
        }
    }