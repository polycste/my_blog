<?php

$string = "blogblogblogblogblogblogblog";

function read_more($string, $length = 20){
   $string_array = explode(' ', $string);
    $string_array_length = count($string_array);
    $new_string = "";
    if($length > $string_array_length){
        $length = $string_array_length;
    }
   for($i = 0; $i < $length; $i++){
     $new_string .= $string_array[$i] . ' ';
   }
    return $new_string;
}
function mysqli_time_format($time){
  $time = strtotime($time);
  return date('M d, Y', $time);
}


