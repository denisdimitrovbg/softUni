<?php


class CatFactory implements CatFactoryInterFace
{
    /**
     * @param string $breed
     * @param string $name
     * @param int $parm
     * @return Cat
     * @throws Exception
     */
    public static function create(string $breed, string $name, int $parm): Cat
    {
       if(!class_exists($breed)){
           throw new Exception('There is not such a breed'.PHP_EOL);
       }else{
           return new $breed($breed, $name, $parm);
       }
    }


}