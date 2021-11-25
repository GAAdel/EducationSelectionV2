  <main class="main container">
    <form action="index.php" method="get">

      <?php if (isEmpty($answers->age)) { ?>
        <label for="">Ваш возраст:</label>
        <input type=" text" name="" value="<?php echo $answers->age?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->is_licei)) { ?>
        <label for="">Вам нужен лицей:</label>
        <input type=" text" name="" value="<?php echo $answers->is_licei?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->stepen)) { ?>
        <label for="">Выбранная степень:</label>
        <input type=" text" name="" value="<?php echo $answers->stepen?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->is_colledge)) { ?>
        <label for="">Вы выбрали:</label>
        <input type=" text" name="" value="<?php echo $answers->is_colledge?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->gender)) { ?>
        <label for="">Ваш пол:</label>
        <input type=" text" name="" value="<?php echo $answers->gender?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->forma)) { ?>
        <label for="">Форма обучения:</label>
        <input type=" text" name="" value="<?php echo $answers->forma?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->sovet)) { ?>
        <label for="">Наличие диссертационного совета:</label>
        <input type=" text" name="" value="<?php echo $answers->sovet?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->forma2)) { ?>
        <label for="">Форма обучения:</label>
        <input type=" text" name="" value="<?php echo $answers->forma2?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->subjects)) { ?>
        <label for="">Выбранные предметы:</label>
        <input type=" text" name="" value="<?php echo $answers->subjects?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->vstypit)) { ?>
        <label for="">Наличие вступительных испытаний:</label>
        <input type=" text" name="" value="<?php echo $answers->vstypit?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->naprav)) { ?>
        <label for="">Направление обучения:</label>
        <input type=" text" name="" value="<?php echo $answers->naprav?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->city)) { ?>
        <label for="">Город поступления:</label>
        <input type=" text" name="" value="<?php echo $answers->city?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->is_home)) { ?>
        <label for="">Необходимо место проживания:</label>
        <input type=" text" name="" value="<?php echo $answers->is_home?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->is_active)) { ?>
        <label for="">Активная внеучебная деятельность:</label>
        <input type=" text" name="" value="<?php echo $answers->is_active?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->is_lgoti)) { ?>
        <label for="">Наличие льгот:</label>
        <input type=" text" name="" value="<?php echo $answers->is_lgoti?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->is_budget)) { ?>
        <label for="">Рассматриваете бюджет:</label>
        <input type=" text" name="" value="<?php echo $answers->is_budget?>" /><br>
      <?php } ?>

      <?php if (isEmpty($answers->budget)) { ?>
        <label for="">Ваш бюджет:</label>
        <input type=" text" name="" value="<?php echo $answers->budget?>" /><br>
      <?php } ?>
      
      <?php if (isEmpty($answers->ball)) { ?>
        <label for="">Ваш средний балл:</label>
        <input type=" text" name="" value="<?php echo $answers->ball?>" /><br>
      <?php } ?>

      <input class="btn" type="submit" value="Заново" />
    </form>
  </main>