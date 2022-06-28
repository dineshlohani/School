<?php

if (! function_exists('convertNumber')) {
  function convertNumber($nos=null) {
    $n = '';
    switch($nos){
      case "०": $n = 0; break;
      case "१": $n = 1; break;
      case "२": $n = 2; break;
      case "३": $n = 3; break;
      case "४": $n = 4; break;
      case "५": $n = 5; break;
      case "६": $n = 6; break;
      case "७": $n = 7; break;
      case "८": $n = 8; break;
      case "९": $n = 9; break;
      
      case "0": $n = "०"; break;
      case "1": $n = "१"; break;
      case "2": $n = "२"; break;
      case "3": $n = "३"; break;
      case "4": $n = "४"; break;
      case "5": $n = "५"; break;
      case "6": $n = "६"; break;
      case "7": $n = "७"; break;
      case "8": $n = "८"; break;
      case "9": $n = "९"; break;
      }
    return $n;
  }
}


if (! function_exists('convertedNum')) {
  function convertedNum($string)
  {
    $string = str_split($string);
    $out = '';
    foreach($string as $str)
    {
      if(is_numeric($str))
      {
        $out .= convertNumber($str);                     
      } else {
          $out .=$str;
      }
    }
    
    return $out;
  }
}