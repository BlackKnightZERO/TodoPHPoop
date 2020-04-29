<?php
require "vendor/autoload.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>To-Do</title>
	<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="asset/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
	<div class="body-header">
		<h3>To-Dos</h3>
	</div>
	<div class="my-container">
		<form method="POST" id="form_newTodo">
			<div class="to-do-input">
				<input type="text" name="newTodo" id="newTodo" placeholder="..Add New Task..">
				<!-- <input type="hidden" name="action" id="action" />   -->
				<!-- <button type="submit" style="display:none">Add</button> -->
				<input type="submit" name="button_action" id="button_action" value="Insert" style="display:none" />
			</div>
		</form>
		<div class="to-do-lists" id="to-do-lists">
		</div>
		<hr>

		<div class="to-do-bottom">
			<div class="to-do-bottom-l" id="to-do-bottom-l">
				<input type="checkbox" name="" id="checkbox-checkall" >
                <label>check-all</label>
			</div>
			<div class="to-do-bottom-m">
				<button id="btn-all">All</button>
				<button id="btn-act">Active</button>
				<button id="btn-com">Completed</button>
			</div>
			<div class="to-do-bottom-r">
				<button id="btn-clr">clear</button>
			</div>
		</div>
	</div>
    <script type="text/javascript">
        $(function() {	

    	    $("#all").show();
    	    $("#active").hide();
    	    $("#completed").hide();
    	    //all-clicked
    	    $( "#btn-all" ).on( "click", function() {
    	    window.location.reload(true);
    	      console.log( "click" );
    	      $("#all").show();
    	      $("#active").hide();
    	      $("#completed").hide();
    	    });
    	    //active-clicked
    	    $( "#btn-act" ).on( "click", function() {
    	      console.log( "click" );
    	      $("#active").show();
    	      $("#all").hide();
    	      $("#completed").hide();
    	    });
    	    //completed-clicked
    	    $( "#btn-com" ).on( "click", function() {
    	      console.log( "click" );
    	      $("#completed").show();
    	      $("#all").hide();
    	      $("#active").hide();
    	    });
    	});


    	$(function() {
    	 $('#form_newTodo').on('submit', function(event){  
                event.preventDefault();  
                var newTodo = $('#newTodo').val(); 
                if(newTodo.trim()!= ''){
                	var action = "Insert"; 
                	var newTodo = newTodo.trim();
                	console.log(action,newTodo);
                	$.ajax({  
                          url:"handler.php",  
                          method:"POST",  
                          data:{
                          	action:action,
                          	newTodo: newTodo,
                          },    
                          success:function(data)  
                          {  
                                window.location.reload(true);
                          },
                          error:function(){
                     		console.log("!");
                     	  }  
                     });  
                }

                });
        }); 
	$(function() {
        $(".crossId").on( "click", function() {
        	// e.preventDefault(e);
        	console.log($(this).parent().attr('id'));

        	var action = "Delete"; 
        	var dltTodo = parseInt($(this).parent().attr('id'));
        	console.log(action,dltTodo);
        	if(dltTodo!=''){
        		$.ajax({  
                          url:"handler.php",  
                          method:"POST",  
                          data:{
                          	action:action,
                          	dltTodo: dltTodo,
                          },  
                          success:function(data)  
                          {  
                               //console.log(data);  
                               // $('#newTodo').val('');  
                               //load_data();
                               window.location.reload(true);
                          },
                          error:function(){
                     		console.log("!");
                     	  }  
                     });    
        	}   
        }); 

    });

	$(function(){
		$(".single-todo-checkbox").on("change",function(){
						if($(this).prop("checked") == false){
			              var action = "UncheckSingle";  
			              var id = $(this).parent().attr('id');
			              console.log(action,id);
						    $.ajax({  
						         url:"handler.php",
						         method:"POST",  
						         data:{
						         	id:id,
						         	action:action,
						         },  
						         success:function(data)  
						         {  
						          window.location.reload(true);
						          //sleep(5000);
						          // console.log(data);
						         },
						         error:function(){
						         	console.log("!");
						         	//sleep(5000);
						         }  
								});
			            }
			            else if($(this).prop("checked") == true){
			               var action = "CheckSingle";  
			              var id = $(this).parent().attr('id');
			              console.log(action,id);
						    $.ajax({  
						         url:"handler.php",
						         method:"POST",  
						         data:{
						         	id:id,
						         	action:action,
						         },  
						         success:function(data)  
						         {  
						          window.location.reload(true);
						          //sleep(5000);
						          // console.log(data);
						         },
						         error:function(){
						         	console.log("!");
						         	//sleep(5000);
						         }  
								});
			            }
			            else{
			            	console.log("else block error");
			            }
		});
	});

	$(function(){
		$("#checkbox-checkall").on("change", function(){

			if($(this).prop("checked") == false){
              var action = "UncheckAll";  
              console.log(action);
			    $.ajax({  
			         url:"handler.php",
			         method:"POST",  
			         data:{action:action},  
			         success:function(data)  
			         {  
			          window.location.reload(true);
			          //sleep(5000);
			          // console.log(data);
			         },
			         error:function(){
			         	console.log("!");
			         	
			         }  
					});
            }
            else if($(this).prop("checked") == true){
               var action = "CheckAll";  
                console.log(action);
			    $.ajax({  
			         url:"handler.php",
			         method:"POST",  
			         data:{action:action},  
			         success:function(data)  
			         {  
			          window.location.reload(true);
			          //sleep(5000);
			          // console.log(data);
			         },
			         error:function(){
			         	console.log("!");
			         	
			         }  
					});
            }
            else{
            	console.log("else block error");
            }
		});
	});	
		$(function(){
			$( "#btn-clr" ).on( "click", function() {
				var action = "DeleteAllCompleted";  
				$.ajax({  
			         url:"handler.php",
			         method:"GET",  
			         data:{action:action},  
			         success:function(data)  
			         {  
			             window.location.reload(true);
			         },
			         error:function(){
			         	console.log("!");
			         }  
			    });  
			});
		});
			//functions
			load_data();
			function load_data(){
				var action = "Load";  
			    $.ajax({  
			         url:"handler.php",
			         method:"GET",  
			         data:{action:action},  
			         success:function(data)  
			         {  
			              $("#to-do-lists").html(data);
			              $("#all").show();
			              $("#active").hide();
			              $("#completed").hide();
			         },
			         error:function(){
			         	console.log("!");
			         }  
			    });  
			}
			// function load_checkall_data(){
			// 	var action = "CountCompleted"; 
			//     $.ajax({  
			//          url:"handler.php",
			//          method:"GET",  
			//          data:{action:action},  
			//          success:function(data)  
			//          {  
			//          	 $("#to-do-bottom-l").html(data);
			//          },
			//          error:function(){
			//          	console.log("!");
			//          }  
			//     });  
			// }

    </script>
</body>
</html>
