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

// echo "Наши введенные значения : <br>";

// if(isEmpty($answers->age)) {
//   dump2($answers->age, "age: ");
// }
// if(isEmpty($answers->is_licei)) {
//   dump2($answers->is_licei, "is_licei: ");
// }
// if(isEmpty($answers->stepen)) {
//   dump2($answers->stepen, "stepen: ");
// }

// if(isEmpty($answers->is_colledge)) {
//   dump2($answers->is_colledge, "is_colledge: ");
// }

// if(isEmpty($answers->gender)) {
//   dump2($answers->gender, "gender: ");
// }

// if(isEmpty($answers->forma)) {
//   dump2($answers->forma, "forma: ");
// }

// if(isEmpty($answers->sovet)) {
//   dump2($answers->sovet, "sovet: ");
// }

// if(isEmpty($answers->forma2)) {
//   dump2($answers->forma2, "forma2: ");
// }

// if(isEmpty($answers->subjects)) {
//   dump2($answers->subjects, "subjects: ");
// }

// if(isEmpty($answers->vstypit)) {
//   dump2($answers->vstypit, "vstypit: ");
// }

// if(isEmpty($answers->naprav)) {
//   dump2($answers->naprav, "naprav: ");
// }

// if(isEmpty($answers->city)) {
//   dump2($answers->city, "city: ");
// }

// if(isEmpty($answers->is_home)) {
//   dump2($answers->is_home, "is_home: ");
// }

// if(isEmpty($answers->is_active)) {
//   dump2($answers->is_active, "is_active: ");
// }

// if(isEmpty($answers->is_lgoti)) {
//   dump2($answers->is_lgoti, "is_lgoti: ");
// }

// if(isEmpty($answers->is_budget)) {
//   dump2($answers->is_budget, "is_budget: ");
// }

// if(isEmpty($answers->budget)) {
//   dump2($answers->budget, "budget: ");
// }

// if(isEmpty($answers->ball)) {
//   dump2($answers->ball, "ball: ");
// } 

// echo "<br>";


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


// echo "Наши значения после правил: <br>";

// if(isEmpty($age)) {
//   dump2($age, "age: ");
// }
// if(isEmpty($type)) {
//   dump2($type, "type: ");
// }
// if(isEmpty($stepen)) {
//   dump2($stepen, "stepen: ");
// }
// if(isEmpty($gender)) {
//   dump2($gender, "gender: ");
// }
// if(isEmpty($forma)) {
//   dump2($forma, "forma: ");
// }
// if(isEmpty($sovet)) {
//   dump2($sovet, "sovet: ");
// }
// if(isEmpty($subjects)) {
//   dump2($subjects, "subjects: ");
// }
// if(isEmpty($vstypit)) {
//   dump2($vstypit, "vstypit: ");
// }
// if(isEmpty($naprav)) {
//   dump2($naprav, "naprav: ");
// }
// if(isEmpty($city)) {
//   dump2($city, "city: ");
// }
// if(isEmpty($is_home)) {
//   dump2($is_home, "is_home: ");
// }
// if(isEmpty($is_active)) {
//   dump2($is_active, "is_active: ");
// }
// if(isEmpty($is_lgoti)) {
//   dump2($is_lgoti, "is_lgoti: ");
// }
// if(isEmpty($is_budget)) {
//   dump2($is_budget, "is_budget: ");
// }
// if(isEmpty($budget)) {
//   dump2($budget, "budget: ");
// }
// if(isEmpty($ball)) {
//   dump2($ball, "ball: ");
// }
// echo "<br>";


$vyzi = "";
  for ($j = 1; $j <= (R::count( 'objects')); $j++) {
    $objects = R::load('objects', $j);

    // тут проверка параметров пользователя
    for ($i = 1; $i <= (R::count( 'objects')); $i++) {
      // dump2($i, "ИНДЕКС ");
      $count = 0;
      
      $object_type = $objects->type;
      $object_forma = $objects->forma;
      $object_naprav = $objects->naprav;
      $object_city = $objects->city;
      $object_is_home = $objects->is_home;
      $object_is_active = $objects->is_active;
      $object_budget = $objects->budget;
      $object_ball = $objects->ball;

      // echo "Свойства учебного зведения: <br>";
      // dump2($object_type);
      // dump2($object_forma);
      // dump2($object_naprav);
      // dump2($object_city);
      // dump2($object_is_home);
      // dump2($object_is_active);
      // dump2($object_budget);
      // dump2($object_ball);

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
    // dump2("$count", "Количество совпадений: ");
    if ($count == 7 || $count == 8) {
      $vyzi = $vyzi . "- " .$objects->name . "<br>";
    } 
  }


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
      <?php echo "<h2> Подходящие учебные заведения: </h2>" . "<p> $vyzi</p>"; ?>
      <input class="btn" type="submit" value="Заново" />
    </form>
</main>
  
<?php
require "blocks/footer.php";
?>