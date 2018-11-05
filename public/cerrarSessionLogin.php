<?php
include_once 'Token.php';

  session_start();
  Token::revocarToken($_SESSION['token']);
  session_unset();
  
  session_destroy();
  
  header('Location: inicio');
?>

