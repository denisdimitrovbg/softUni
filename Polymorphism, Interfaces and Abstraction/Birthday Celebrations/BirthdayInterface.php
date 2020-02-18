<?php


interface BirthdayInterface
{
    public function getBirthday():string;
    public function checkBirthday(string $date);
}