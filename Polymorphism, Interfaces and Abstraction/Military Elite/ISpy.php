<?php


interface ISpy
{
    public function setCodeNumber(string $codeNumber): void;
    public function getCodeNumber(): string;
}