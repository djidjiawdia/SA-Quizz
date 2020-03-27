<?php

    function getQuestions(){
        $fetchJson = file_get_contents(dirname(__DIR__)."/questions.json");
        return json_decode($fetchJson, true);
    }

    function getNbrQuestion(){
        $fetchJson = file_get_contents(dirname(__DIR__)."/nbrQuest.json");
        return json_decode($fetchJson, true);
    }

    function saveNbrQuest($post){
        if(file_put_contents(dirname(__DIR__)."/nbrQuest.json", json_encode($post))){
            return true;
        }else{
            return false;
        }
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

    
    function interfaceQuestions(){
        $tabs = [];
        $nbrQuest = getNbrQuestion();
        $n = $nbrQuest['nbrQuest'];
        $questions = getQuestions();
        $rand = array_rand($questions, (int)$n);
        for($i=0; $i<$n; $i++){
            $tabs[] = $questions[$rand[$i]];
        }
        return $tabs;
    }