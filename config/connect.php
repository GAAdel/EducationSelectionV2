<?php

require_once "rb/rb.php";

R::setup(
  'mysql:host=localhost;dbname=education_redbean',
  'root',
  ''
);

if (!R::testConnection()) die('No DB connection!');
