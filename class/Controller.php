<!-- <?php

namespace WeDevsT2;

use WeDevsT2\Todo;

if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "Load")  
      {  
      	$obj = new Todo();
      	$data = $obj->todos();

      	echo "$data";
      }
}       -->