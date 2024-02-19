<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// session_start();

spl_autoload_register(function ($className) {
  $path = "class/{$className}.php";
  if (file_exists($path)) {
    require $path;
  } else {
    die ("File $path tidak tersedia");
  }
});
