<?php


interface ILeutenantGeneral
{
    public function addPrivate(PrivateS $private):void;
    public function getPrivates():array;
}