<?php


namespace Data;


class ErrorDTO
{
    /**
     * @var string
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message=$message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }



}