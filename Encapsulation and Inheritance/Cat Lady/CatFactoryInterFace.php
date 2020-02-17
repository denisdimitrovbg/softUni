<?php


interface CatFactoryInterFace
{
    public static function create(string $breed, string $name, int $parm) : Cat;

}