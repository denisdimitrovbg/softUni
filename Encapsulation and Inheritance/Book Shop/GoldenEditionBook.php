<?php


class GoldenEditionBook extends Book
{
    public function increasePrice():float{
        return parent::getPrice()*1.3;
    }

}