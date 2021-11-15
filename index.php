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
    $text = "Пусто";
  } else {
    $text = $elem;
  }
  return $text;
}

// dump($user);

// $questions = R::loadAll('questions', array(1, 2, 3));
// foreach ($questions as $question) {
//   echo $question->text . '<br>';
// }
?>

<?php

// таким образом получаем наш ввод
if (isset($_GET['param_name'])) {
  $vvod = $_GET['param_name'];
  $vvod_value = $_GET[$vvod];

  $next_question = $_GET['next_question'];

  dump2($vvod_value, " Значение которое вы ввели:");
  // dump2($next_question, "Следующий вопрос:");

  // узнаем  следующий вопрос по таблице правил 

  $next_rule = R::load('rules', $next_question);

  if (!empty($next_rule->value_str)) {
    if ($next_rule->value_str == $vvod_value) {
      $next_question = $next_rule->true_quest;
    } else {
      $next_question = $next_rule->false_quest;
      // echo "Текущий вопрос: " . $next_question;
    }
  } else { // если это число
    if ($next_rule->value_int == $vvod_value) {
      $next_question = $next_rule->true_quest;
    } else {
      $next_question = $next_rule->false_quest;
      // echo "Текущий вопрос: " . $next_question;
    }
  }

  $id = $next_question;

  $first_qestion = R::load('questions', $id);

  $text = $first_qestion->text;
  $type = $first_qestion->type;
  $answer1 = isEmpty($first_qestion->answer1);
  $answer2 = isEmpty($first_qestion->answer2);
  $answer3 = isEmpty($first_qestion->answer3);
  $answer4 = isEmpty($first_qestion->answer4);
  $parametr = $first_qestion->parametr;
  $id_rule = $first_qestion->id_rule;

  dump2($id, "Наш текущий вопрос:");
  dump2($text);
  echo 'Тип вопроса: ';
  dump2($type);

  dump2($answer1);
  dump2($answer2);
  dump2($answer3);
  dump2($answer4);

  dump2($parametr);
  dump2($id_rule, "id_rule:");

  ///////////////
} else {

  $id = 1;

  $first_qestion = R::load('questions', $id);

  $text = $first_qestion->text;
  $type = $first_qestion->type;
  $answer1 = $first_qestion->answer1;
  $answer2 = $first_qestion->answer2;
  $answer3 = $first_qestion->answer3;
  $answer4 = $first_qestion->answer4;
  $parametr = $first_qestion->parametr;
  $id_rule = $first_qestion->id_rule;
}


// echo 'Тип вопроса: ';
// dump2($type);

// dump2($answer1);
// dump2($answer2);
// dump2($answer3);
// dump2($answer4);

// dump2($parametr);
// dump2($id_rule);



// if (isset($_GET[$parametr])) {
//   echo 'Тут передали параметр: ' . $_GET[$parametr];
// }

if ($type == 0) {
  type0($text, $parametr, $id_rule);
} else if ($type == 2) {
  type2($text, $parametr, $answer1, $answer2, $id_rule);
} else if ($type == 3) {
  type3($text, $parametr, $answer1, $answer2, $answer3, $id_rule);
} else {
  type4($text, $parametr, $answer1, $answer2, $answer3, $answer4, $id_rule);
}


?>

<?php
function type0($text, $parametr, $id_rule)
{
?>
  <main class="main container">
    <form action="index.php" method="get">
      <input type="hidden" name="param_name" value="<?php echo $parametr ?>">
      <input type="hidden" name="next_question" value="<?php echo $id_rule ?>">
      <?php echo $text ?> <input type=" text" name="<?php echo $parametr ?>" /><br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>

<?php
function type2($text, $parametr, $answer1, $answer2, $id_rule)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
      <input type="hidden" name="param_name" value="<?php echo $parametr ?>">
      <input type="hidden" name="next_question" value="<?php echo $id_rule ?>">
      <label for=""><?php echo $text; ?></label><br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" /><?php echo $answer1 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>

<?php
function type3($text, $parametr, $answer1, $answer2, $answer3, $id_rule)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
      <input type="hidden" name="param_name" value="<?php echo $parametr ?>">
      <input type="hidden" name="next_question" value="<?php echo $id_rule ?>">
      <label for=""><?php echo $text; ?></label><br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" /><?php echo $answer1 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer3 ?> <br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>

<?php
function type4($text, $parametr, $answer1, $answer2, $answer3, $answer4, $id_rule)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
      <input type="hidden" name="param_name" value="<?php echo $parametr ?>">
      <input type="hidden" name="next_question" value="<?php echo $id_rule ?>">
      <label for=""><?php echo $text; ?></label><br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" /><?php echo $answer1 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer3 ?>" /><?php echo $answer3 ?> <br>
      <input type="radio" name="<?php echo $parametr ?>" value="<?php echo $answer4 ?>" /><?php echo $answer4 ?> <br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>


<?php
require "blocks/footer.php";
?>