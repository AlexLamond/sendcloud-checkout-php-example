<?php

require_once(__DIR__."/../vendor/autoload.php");

Class Functions
{
    static function setEnvVars()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, ".keys.env"); 
        $dotenv->load();
    }
}