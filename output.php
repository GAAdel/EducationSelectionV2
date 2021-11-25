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

// for ($i = 1; $i <= 5; $i++) {
//       if ($i % 2 == 0) {
//         echo "Число четное";
//       } else {  
//         continue;
//       }
//     }

$answers = R::load('answers', 1);
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

$type = "";
for ($i = 1; $i <= (R::count( 'simple_rules')); $i++) {

  $rules = R::load('simple_rules', $i);
  // echo $rules;

  $triger = $rules->triger;
  $triger_value = $rules->triger_value;
  // dump2($answers->$triger);      // ответ пользователя на данный триггер
  // dump2($triger_value);          // значение триггера

  $rule1 = $rules->rule1;
  $rule1_value = $rules->rule1_value;
  // dump2($answers->$rule1);   
  // dump2($rule1_value);

  $rule2 = $rules->rule2;
  $rule2_value = $rules->rule2_value;
  // dump2($answers->$rule2);
  // dump2($rule2_value);

  $rule3 = $rules->rule3;
  $rule3_value = $rules->rule3_value;
  // dump2($answers->$rule3);
  // dump2($rule3_value);

  $rule4 = $rules->rule4;
  $rule4_value = $rules->rule4_value;
  // dump2($answers->$rule4);
  // dump2($rule4_value);

      // dump2($answers->$rule1, "Проверим это  1:");
      // dump2($rule1_value, "Проверим это 2:");

  if (!empty($answers->$triger) && $answers->$triger == $triger_value) { // если stepent не пустой и он равен нашему значению
    if (!empty($answers->$rule1)) {
      if ($answers->$rule1 === $rule1_value) {
        $type = $rules->type;
      } else {  
        continue;
      }
    } else {
      $type = $rules->type;
    }


    if (!empty($answers->$rule2)) {
      if ($answers->$rule2 ==  $rule2_value) {
        $type = $rules->type;
      } else {
        continue;
      }
    } 

    if (!empty($answers->$rule3)) {
      if ($answers->$rule3 ==  $rule3_value) {
        $type = $rules->type;
      } else {
        continue;
      }
    } 

    if (!empty($answers->$rule4)) {
      if ($answers->$rule4 ==  $rule4_value) {
        $type = $rules->type;
      } else {
        continue;
      }
    } 
  }
}



if (isEmpty($type)) {
  dump2($type, "Тип вуза:");
}

$my_stepen = $answers->stepen; 
$my_naprav = $answers->naprav; 
$my_city = $answers->city; 
$my_is_home = $answers->is_home;
$my_type = $type;

  // dump2($my_stepen);
  // dump2($my_naprav);
  // dump2($my_city);
  // dump2($my_is_home);
  // dump2($my_type);

$vyzi = "";
  for ($j = 1; $j <= (R::count( 'objects')); $j++) {
    $objects = R::load('objects', $j);

    // тут проверка параметров пользователя
    for ($i = 1; $i <= (R::count( 'objects')); $i++) {
      $count = 0;
      $stepen = $objects->stepen;
      $naprav = $objects->naprav;
      $city = $objects->city;
      $is_home = $objects->is_home;
      $type = $objects->type;

      // dump2($stepen);
      // dump2($naprav);
      // dump2($city);
      // dump2($is_home);
      // dump2($type);

      if ($my_stepen == $stepen) {
        $count += 1;
      }

      if ($my_naprav == $naprav) {
        $count += 1;
      }

      if ($my_city == $city) {
        $count += 1;
      }

      if ($my_is_home == $is_home) {
        $count += 1;
      }

      if ($my_type == $type) {
        $count += 1;
      }

    }

    if ($count == 5) {
      $vyzi = $vyzi . "- " .$objects->name . "<br>";
    } 
  }

?>


<main class="main container">
    <form action="index.php" method="get">
      <?php echo "<h2> Подходящие вузы: </h2>" . "<p> $vyzi</p>"; ?>
      <input class="btn" type="submit" value="Заново" />
    </form>
</main>

  
<?php
require "blocks/footer.php";
?>