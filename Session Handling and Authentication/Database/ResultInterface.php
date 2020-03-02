<?php


namespace Database;


interface ResultInterface
{
    /**
     * @param $className
     * @return \Generator
     */
    public function fetch($className): \Generator;
}