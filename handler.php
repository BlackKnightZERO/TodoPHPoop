<?php
require "vendor/autoload.php";
use WeDevsT2\Todo;

if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "Load")  
      {  
      	$obj = new Todo();
      	$data = $obj->todos();
      	echo '
      		<div id="all">';
      	foreach ($data as $key => $value) {
      		echo '
      		<div class="single-todo" id="'.$value['id'].'"';
      		echo ( $value['status'] != 1 ) ? 'style="text-decoration: line-through;"' : '';
      		echo '
      		>
	      		<input type="checkbox" class="single-todo-checkbox"';
	      		echo ( $value['status'] != 1 ) ? 'checked' : '';
	      		echo '
	      		>	
	      		'.$value['name'].'
	      		<span class="crossId">&times;</span>
      		</div>
      		';
      	}
      	echo '</div>';

      	$obj2 = new Todo();
      	$data2 = $obj2->activeTodos();

      	echo '
      		<div id="active">';
      	foreach ($data2 as $key => $value) {
      		echo '
      		<div class="single-todo" id="'.$value['id'].'"';
      		echo ( $value['status'] != 1 ) ? 'style="text-decoration: line-through;"' : '';
      		echo '
      		>
	      		<input type="checkbox" class="single-todo-checkbox"';
	      		echo ( $value['status'] != 1 ) ? 'checked' : '';
	      		echo '
	      		>	
	      		'.$value['name'].'
	      		<span class="crossId">&times;</span>
      		</div>
      		
      		';
      	}
      	echo '</div>';
      	$obj3 = new Todo();
      	$data3 = $obj3->completedTodos();
      	echo '
      		<div id="completed">';
      	foreach ($data3 as $key => $value) {
      		echo '
      		<div class="single-todo" id="'.$value['id'].'"';
      		echo ( $value['status'] != 1 ) ? 'style="text-decoration: line-through;"' : '';
      		echo '
      		>
	      		<input type="checkbox" class="single-todo-checkbox"';
	      		echo ( $value['status'] != 1 ) ? 'checked' : '';
	      		echo '
	      		>	
	      		'.$value['name'].'
	      		<span class="crossId">&times;</span>
      		</div>
      		
      		';
      	}
      	echo '</div>';
      }
}   
if(isset($_POST["action"]))  
 {    
 	if($_POST["action"] == "Insert")  
      {  
      	if(isset($_POST["newTodo"]))  
 			{
		      	if($_POST["newTodo"])
		      	{
		      		// echo $_POST["newTodo"];	
		      		// return "fuck";	
		      		$obj = new Todo();
		      		$obj->addTodos($_POST["newTodo"]);

		      	}
		    }
      }
}

if(isset($_POST["action"]))  
 {    
 	if($_POST["action"] == "Delete")  
      {  
      	if(isset($_POST["dltTodo"]))  
 			{
		      	if($_POST["dltTodo"])
		      	{
		      		$obj = new Todo();
		      		$obj->deleteTodo($_POST["dltTodo"]);
		      	}
		    }
      }
}
if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "CheckAll")  
      {  
            $obj = new Todo();
            $obj->CheckAll();
      } 
}  
if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "UncheckAll")  
      {  
            $obj = new Todo();
            $obj->UncheckAll();
            
      } 
} 
if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "CheckSingle")  
      {  
            if($_POST["id"])
            {
                  $obj = new Todo();
                  $obj->CheckSingle($_POST["id"]);
            }  
      } 
}  
if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "UncheckSingle")  
      {  
            if($_POST["id"])
            {
                  $obj = new Todo();
                  $obj->UncheckSingle($_POST["id"]);
            }  
      } 
}  
if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "CountCompleted")  
      {  
            $obj = new Todo();
            $data = $obj->countcompletedtodos();
            if($data==false){
                  
            } else {
                  
            }
      } 
}  

if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "DeleteAllCompleted")  
      {  
            $obj = new Todo();
            $data = $obj->DeleteAllCompleted();
      } 
}  

