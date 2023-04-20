<?php

//se il parametro è settato :
if(isset($_POST['name'])){

// creo variabile con valore 'mio file .json'
   $todosJson =  file_get_contents('todos.json');
   
   //crero variabile che ha valore json formattato in variabile php
    $todos = json_decode($todosJson);


//creo variabile newTodo che poi assumerà valore 'Oggetto', la proprietà name assume valore del parametro '$_POST'
    $newTodo = (object) array('name' => $_POST['name'], 'status' => false);

    //Pusho il nuovo Todo dentro l'array
    $todos[] = $newTodo;

    //riporto la variabile in formato JSON
    $newTodosJSON = json_encode($todos);

    //Riscrivo il file Json con le aggiunte
    file_put_contents('todos.json', $newTodosJSON);

    

} else {

    $stringaTodo = file_get_contents('todos.json');
    
    
    $todos = json_decode($stringaTodo);
    
    
    
    
     header('Content-Type: application/json');
    
    
     echo json_encode($todos);

}


