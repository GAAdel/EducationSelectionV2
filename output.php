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

$age = "";
$type = "";   
$stepen = "";
$gender = "";
$forma = "";
$sovet = "";
$subjects = "";
$vstypit = "";
$naprav = "";
$city = "";
$is_home = "";
$is_active = "";
$is_lgoti = "";
$is_budget = "";
$budget = "";
$ball = "";



$rules = R::findAll('simple_rules');

// Простые правила
foreach ($keys as $key) {
  if (isEmpty($answers[$key])) {       
    foreach ($rules as $rule) {
      if ($key == $rule->if_atr) {
        if ($answers[$key] == $rule->if_value) {
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
        $val1 = $answers[$key];         
        foreach ($keys as $key) {
          if ($key == $rule->if2_atr) {
            $val2 = $answers[$key];    
            if (($val1 == $rule->if1_value || $val1 <= $rule->if1_value) && $val2 == $rule->if2_value ) {
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
    if ($rule->then_atr == "forma") {
      $forma =  $rule->then_value;        
    }
    if ($rule->then_atr == "type") {
      $type =  $rule->then_value;        
    }
  }
}


$vyzi = "";
  for ($j = 1; $j <= (R::count( 'objects')); $j++) {
    $objects = R::load('objects', $j);


    for ($i = 1; $i <= (R::count( 'objects')); $i++) {
      $count = 0;
      
      $object_type = $objects->type;
      $object_forma = $objects->forma;
      $object_naprav = $objects->naprav;
      $object_city = $objects->city;
      $object_is_home = $objects->is_home;
      $object_is_active = $objects->is_active;
      $object_budget = $objects->budget;
      $object_ball = $objects->ball;

      if ($object_type == $type) {
        $count += 1;
      }

      if ($object_forma == $forma) {
        $count += 1;
      }

      if ($object_naprav == $naprav) {
        $count += 1;
      }

      if ($object_city == $city) {
        $count += 1;
      }

      if ($object_is_home == $is_home) {
        $count += 1;
      }

      if ($object_is_active == $is_active) {
        $count += 1;
      }

      if ($object_budget >= $budget) {
        $count += 1;
      }

      if ($object_ball >= $ball) {
        $count += 1;
      }

    }

    if ($count == 7 || $count == 8) {
      $vyzi = $vyzi . "- " .$objects->name . "<br>";
    } 
  }

?>

<main class="main container">
    <form action="index.php" method="get">
      <?php echo "<h2> Подходящие учебные заведения: </h2>" . "<p> $vyzi</p>"; ?>
      <input class="btn" type="submit" value="Заново" />
    </form>
</main>
  
<?php
require "blocks/footer.php";
?>