<?php

use App\Models\PalikaProfile;

if(!function_exists('getProfile')) {
  function getProfile(){
    $profile = PalikaProfile::first();
    return $profile;
  }
}

if(! function_exists('getCurrentUser()')) {
  function getCurrentUser() {
    $data  = ['userID' => Auth()->user()->id, 'shakhaID' => Auth()->user()->shakha_id];
    return $data;
  }
}

//get month names 
if(!function_exists('monthNames')) {
  function monthNames() {
    return array(
      '4' => 'श्रावण',
      '5' => 'भाद्र',
      '6' => 'आश्विन',
      '7' => 'कार्तिक',
      '8' => 'मार्ग',
      '9' => 'पौष',
      '10' => 'माघ',
      '11' => 'फाल्गुन',
      '12' => 'चैत्र',
      '1' => 'वैशाख',
      '2' => 'ज्येष्ठ',
      '3' => 'आषाढ',
    );
  }
}

if(!function_exists('explodeData')) {
  function explodeData($delimiter,$data) {
    return explode($delimiter, $data);
  }
}

if(!function_exists('pp')) {
  function pp($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    exit;
  }
}