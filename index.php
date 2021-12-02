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

?>

<?php

// таким образом получаем наш ввод
if (isset($_GET['param_name'])) {

  $vvod = $_GET['param_name'];
  $vvod_value = $_GET[$vvod];



  // запись ответов пользователя
  $answers = R::load('answers', 1);
  $answers->$vvod = $vvod_value;
  R::store($answers);

  $next_question = $_GET['next_question'];

  // узнаем  следующий вопрос по таблице правил 
  $next_rule = R::findOne('rules', 'id_rule = ?', [$next_question]);

  if ($next_question == "777") {
    header('Location: output.php');
    exit;
  }

  if (!empty($next_rule->value_str)) {
    if ($next_rule->value_str == $vvod_value) {
      $next_question = $next_rule->true_quest;
    } else {
      $next_question = $next_rule->false_quest;
    }
  } else { // если это число
    if ((int)$next_rule->value_int < (int)$vvod_value) {
      $next_question = $next_rule->true_quest;
    } else {
      $next_question = $next_rule->false_quest;
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

  R::wipe('answers');
  $answers = R::dispense('answers');
  $answers->age = "";
  R::store($answers);




$rules = R::findAll('simple_rules');
foreach ($rules as $rule) {
  $rule->used = "false";
  R::store($rule);
}   

$rules2 = R::findAll('complex_rules');
foreach ($rules2 as $rule) {
  $rule->used = "false";
  R::store($rule);
}  

  
}


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
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" checked="checked" /><?php echo $answer1 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input class="btn" class="qwe" type="submit" value="Ответить" />
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
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" checked="checked" /><?php echo $answer1 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer3 ?>" /><?php echo $answer3 ?> <br>
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
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer1 ?>" checked="checked" /><?php echo $answer1 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer2 ?>" /><?php echo $answer2 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer3 ?>" /><?php echo $answer3 ?> <br>
      <input type="radio" class="qwe" name="<?php echo $parametr ?>" value="<?php echo $answer4 ?>" /><?php echo $answer4 ?> <br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>


<?php
require "blocks/footer.php";
?>