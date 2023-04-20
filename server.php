<?php

if(isset($_POST['name'])){

   $todosJson =  file_get_contents('todos.json');
   
    $todos = json_decode($todosJson);

    $newTodo = (object) array('name' => $_POST['name'], 'status' => 'undone');

    
    $todos[] = $newTodo;
    
    $newTodosJSON = json_encode($todos);
    
    file_put_contents('todos.json', $newTodosJSON);

} else {

    $stringaTodo = file_get_contents('todos.json');
    
    
    $todos = json_decode($stringaTodo);
    
    
    
    
     header('Content-Type: application/json');
    
    
     echo json_encode($todos);

}


