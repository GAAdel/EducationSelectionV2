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

function dump2($elem = "Пустота", $text = '')
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

// Простые правила
foreach ($keys as $key) {
  if (isEmpty($answers[$key])) {
    foreach ($rules as $rule) {
      if ($key == $rule->if_atr) {
        if ($answers[$key] == $rule->if_value || $answers[$key] > $rule->if_value){
          $rule->used = "true";
          R::store($rule);
        }
      }
    }
  }
}

foreach ($rules as $rule) {
  if ($rule->used <> "false") {

    if ($rule->then_atr == "age") {
      $age =  $rule->then_value;        
    }

    if ($rule->then_atr == "is_licei") {
      $type =  $rule->then_value;
    }

    if ($rule->then_atr == "stepen") {
      $stepen =  $rule->then_value;
    }

    if ($rule->then_atr == "is_colledge") {
      $type =  $rule->then_value;
    }

    if ($rule->then_atr == "gender") {
      $gender =  $rule->then_value;
    }

    if ($rule->then_atr == "forma") {
      $forma =  $rule->then_value;
    }

    if ($rule->then_atr == "sovet") {
      $sovet =  $rule->then_value;
    }

    if ($rule->then_atr == "forma2") {
      $forma =  $rule->then_value;
    }

    if ($rule->then_atr == "subjects") {
      $subjects =  $rule->then_value;
    }

    if ($rule->then_atr == "vstypit") {
      $vstypit =  $rule->then_value;
    }

    if ($rule->then_atr == "naprav") {
      $naprav =  $rule->then_value;
    }

    if ($rule->then_atr == "city") {
      $city =  $rule->then_value;
    }

    if ($rule->then_atr == "is_home") {
      $is_home =  $rule->then_value;
    }

    if ($rule->then_atr == "is_active") {
      $is_active =  $rule->then_value;
    }

    if ($rule->then_atr == "is_lgoti") {
      $is_lgoti =  $rule->then_value;
    }

    if ($rule->then_atr == "is_budget") {
      $is_budget =  $rule->then_value;
    }

    if ($rule->then_atr == "budget") {
      $budget =  $rule->then_value;
    }
        
    if ($rule->then_atr == "ball") {
      $ball =  $rule->then_value;
    }
  }
}

// Сложные правила
$rules2 = R::findAll('complex_rules');
foreach ($keys as $key) {
  $val1 = "";
  $val2 = "";
  if (isEmpty($answers[$key])) {
    foreach ($rules2 as $rule) {
      if ($key == $rule->if1_atr) {
        $val1 = $answers[$key];         //
        foreach ($keys as $key) {
          if ($key == $rule->if2_atr) {
            $val2 = $answers[$key];    ///
            if ($val1 == $rule->if1_value && $val2 == $rule->if2_value ) {
              $rule->used = "true";
              R::store($rule);
            }
          }
        }
      }
    }
  }
}

foreach ($rules2 as $rule) {
  if ($rule->used <> "false") {

    if ($rule->then_atr == "type2") {
      $type2 =  $rule->then_value;        
    }
  }
}

// dump2($type2);





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

<main class="main container">
    <form action="index.php" method="get">
      <?php echo "<h2> Подходящие вузы: </h2>" . "<p> </p>"; ?>
      <input class="btn" type="submit" value="Заново" />
    </form>
</main>
  
<?php
require "blocks/footer.php";
?>