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
$keys = ["age", "is_licei", "stepen", "is_colledge", "gender", "forma", "sovet", "forma2",
"subjects", "vstypit", "naprav", "city", "is_home", "is_active", "is_lgoti", "is_budget", "budget", "ball"];

$rules = R::findAll('simple_rules');

// foreach ($answers as $answer) {
//   if (isEmpty($answer)) {

//     dump2($answer);
//   }
// }


foreach ($keys as $key) {
  if (isEmpty($answers[$key])) {
    foreach ($rules as $rule) {
      if ($key == $rule->if_atr) {
        if ($answers[$key] == $rule->if_value){
          $rule->used = "true";
          R::store($rule);
        }
      }
    }
    // dump2($answers[$key]);
  }
}


// $rules = R::findAll('simple_rules');
// foreach ($rules as $rule) {
//   dump2($rule);
// }


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