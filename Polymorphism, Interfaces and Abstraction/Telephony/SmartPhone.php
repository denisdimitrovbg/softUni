<?php


class SmartPhone implements CallingInterface, BrowsingInterface
{

    /**
     * @var string
     */
    private $model;

    public function __construct(string $model = null)
    {
        $this->model=$model;
    }

    /**
     * @param string $url
     * @throws Exception
     */


    public function surfing(string $url)
    {
        if(!preg_match('/^[^0-9]+$/',$url)){
            throw new Exception('Invalid URL!'.PHP_EOL);
        }else{
            echo  'Browsing: '.$url.PHP_EOL;
        }
    }

    public function callNumber(string $phoneNumber)
    {
        if(!preg_match('/^[0-9]*$/',$phoneNumber)){
            throw new Exception('Invalid URL!'.PHP_EOL);
        }else{
            echo  'Calling... '.$phoneNumber.PHP_EOL;
        }
    }
}