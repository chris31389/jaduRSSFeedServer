<?php

  switch($_SERVER['REQUEST_METHOD']){
    case "DELETE":
      parse_str($_SERVER['QUERY_STRING'],$output);
      if(isset($output['id'])){
        echo $output['id'];
      }else{
        echo "close";
      }
      break;
    default:
      echo "bye";
  }
?>