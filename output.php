<?php
require_once "config/connect.php";
require_once "blocks/header.php";
?>
<?php

function dump1($elem)
{
  echo '</pre>';
  var_dump($elem);
  echo '</pre>';
}

function dump2($elem, $text = '')
{
  echo $text . " " . $elem;
  echo '</br>';
}

function isEmpty($elem)
{
  if ($elem == "") {
    return false;
  } else {
    return true;
  }
}


$answers = R::load('answers', 1);
foreach ($answers as $answer) {
  if (!empty($answer))
  dump2($answer);
}

// for ($i = 1; $i <= (R::count( 'simple_rules')); $i++) {
//   $rules = R::load('simple_rules', $i);
//   foreach ($rules as $rule) {
//     if ($answers)
//   }
// }













// foreach ($answers as $answer){
//   echo $answer . '<br>';
// }
// dump2($answers->age);
// dump2($answers->is_licei);
// dump2($answers->stepen);
// dump2($answers->is_colledge);
// dump2($answers->gender);
// dump2($answers->forma);
// dump2($answers->sovet);
// dump2($answers->forma2);
// dump2($answers->subjects);
// dump2($answers->vstypit);
// dump2($answers->naprav);
// dump2($answers->city);
// dump2($answers->is_home);
// dump2($answers->is_active);
// dump2($answers->is_lgoti);
// dump2($answers->is_budget);
// dump2($answers->budget);
// dump2($answers->ball);

?>

  
<?php
require "blocks/footer.php";
?>