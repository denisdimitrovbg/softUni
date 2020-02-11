<?php


class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $element
     * @param int $health
     */
    public function __construct(string $name, string $element, int $health)
    {
        $this->setName($name);
        $this->setElement($element);
        $this->setHealth($health);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @param string $element
     */
    private function setElement(string $element): void
    {
        $this->element = $element;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    private function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    /**
     * @param int $dmg
     */
    public function hit(int $dmg):void
    {
        $this->health-= max(0, $dmg);
    }


}