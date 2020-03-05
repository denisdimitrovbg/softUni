<?php


namespace Core;


use Core\TemplateInterface;


class Template implements TemplateInterface
{
    const TEMPLATE_FOLDER = "Template/";
    const TEMPLATE_EXTENSION = ".php";

    public function render(string $templateName, $data = null, $error = null): void
    {
        require_once self::TEMPLATE_FOLDER
            . $templateName
            . self::TEMPLATE_EXTENSION;
    }
}