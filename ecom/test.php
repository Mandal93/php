<?php

$password = 'pass123';

$md5 = md5($password);
echo $md5;
echo "\n";

$default = password_hash($password, PASSWORD_DEFAULT);
echo $default;
