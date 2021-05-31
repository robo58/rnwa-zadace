<?php
spl_autoload_register(function ($class_name){
    if (file_exists('./classes/'.$class_name.'.php')){
        require_once './classes/'.$class_name.'.php';
    } else if (file_exists('./Controllers/'.$class_name.'.php')){
        require_once './Controllers/'.$class_name.'.php';
    } else if (file_exists('./Models/'.$class_name.'.php')){
        require_once './Models/'.$class_name.'.php';
    }});

require_once('./Views/layout.php');

