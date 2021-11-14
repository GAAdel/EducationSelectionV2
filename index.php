<?php
require_once "config/connect.php";
require_once "blocks/header.php";
?>


<?php
function dump1($elem)
{
  echo print_r($elem);
  echo '</pre>';
}

function dump2($elem)
{
  echo ($elem);
  echo '</br>';
}
// dump($user);

// $questions = R::loadAll('questions', array(1, 2, 3));
// foreach ($questions as $question) {
//   echo $question->text . '<br>';
// }
?>

<?php

$id = 3;
$first_qestion = R::load('questions', $id);
$text = $first_qestion->text;
$type = $first_qestion->type;
$answer1 = $first_qestion->answer1;
$answer2 = $first_qestion->answer2;
$answer3 = $first_qestion->answer3;
$answer4 = $first_qestion->answer4;
$parametr = $first_qestion->parametr;
$id_rule = $first_qestion->id_rule;


dump2($text);

echo 'Тип вопроса: ';
dump2($type);

dump2($answer1);
dump2($answer2);
dump2($answer3);
dump2($answer4);

// dump2($parametr);

// dump2($id_rule);


if (isset($_GET[$parametr])) {
  echo 'Тут передали параметр: ' . $_GET[$parametr];
}

if ($type == 0) {
  type0($text, $parametr);
} else if ($type == 2) {
  type2($text, $parametr, $answer1, $answer2);
} else if ($type == 3) {
  type2($text, $parametr, $answer1, $answer2, $answer3);
} else {
  type4($text, $parametr, $answer1, $answer2, $answer3, $answer4);
}


?>

<?php
function type0($text, $parametr)
{
?>
  <main class="main container">
    <form action="index.php" method="get">
      <?php echo $text ?> <input type=" text" name="<?php echo $parametr ?>" /><br>
      <input class="btn" type="submit" value="Ответить" />
    </form>
  </main>

<?php
}
?>

<?php
function type2($text, $parametr, $answer1, $answer2)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
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
function type3($text, $parametr, $answer1, $answer2, $answer3)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
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
function type4($text, $parametr, $answer1, $answer2, $answer3, $answer4)
{
?>
  <main class="main container">
    <form action="index.php" method=" get">
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