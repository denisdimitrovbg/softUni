<?php

namespace Core;

interface TemplateInterface
{
    public function render (string $templateName, $date = null):void;
}