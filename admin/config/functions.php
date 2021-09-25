<?php


function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


function esc_str($s)
{
$conn = $GLOBALS['conn'];

   $escapestring = mysqli_real_escape_string($conn,$s);

   if($escapestring == TRUE)
   {

      return $escapestring;

   }

}

//echo  esc_str($conn,'abcd');
//echo  esc_str('abcd');

?>