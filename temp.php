<?php



//CREATE

// $user = R::dispense('user');   // принимает название таблицы  (тут создаем бин user)

// $user->name = 'Альфис';
// $user->age = 42;
// $user->country = 'Азнакаево';

// $user->name = 'Раиль';
// $user->age = 24;
// $user['country'] = 'Казань';      // Можно обращаться как к массиву

// R::store($user);     // говорим хранить

//READ

// function dump($user)
// {
//   echo '<pre>';
//   echo print_r($user);
//   echo '</pre>';
// }

// $user = R::load('user', 3);
// echo "Имя: " . $user->name;
// echo "Имя: " . $user['name'];   // только от php 7

// dump($user);

// $users = R::loadAll('user', array(1, 2, 3));
// foreach ($users as $user) {
//   echo $user->name . '<br>';
// }
// dump($users);

//методы ReadBean

// $users = R::find('user', "`age` > ?", array(27));
// foreach ($users as $user) {
//   echo $user->name . '<br>';
// }


// поиск по курсорам (разнича с findAll в том, что не запрашивает сразу все данные, а запрашивает по одному)
// $users = R::findCollection('user', "ORDER BY `age` DESC");
// while ($user = $users->next()) {
//   echo $user->name . '<br>';
// }

// данный метод  полезен тогда, когда хочешь достать пользователя или создать и достать если его нет
// $user = R::findOrCreate('user', array(
//   'name' => 'Stark',
//   'age' => 19
// ));

// dump($user);

// echo 'Всего пользователей в системе: ' . R::count('user');


//UPDATE

// $user = R::load('user', 2);
// $user->country = 'France';
// R::store($user);
// dump($user);

//DELETE 
// $user = R::load('user', 4);
// R::trash($user);

// R::close();
