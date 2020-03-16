<?php


namespace Database;


interface ResultInterface
{

    public function fetch($className): \Generator;

}