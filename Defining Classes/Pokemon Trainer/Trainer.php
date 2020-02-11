<?php


class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon [][]
     */
    private $pokemons;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->badges = 0;
        $this->pokemons = [];
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName (string $name):void
    {
        $this->name=$name;
    }

    /**
     * @param Pokemon $pokemon
     */
    public function catchPokemon(Pokemon $pokemon):void
    {
        $this->pokemons[$pokemon->getElement()][]=$pokemon;
    }


    public function receiveBadges():void
    {
        $this->badges++;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function hasPokemonByType(string $type):bool
    {
        return array_key_exists($type, $this->pokemons) && count($this->pokemons[$type]) > 0;

    }

    /**
     * @param int $dmg
     */
    public function hitPokemon(int $dmg):void
    {
        foreach ($this->pokemons as $type => $pokemonsByType){
            foreach ($pokemonsByType as $key => $pokemon){
                $pokemon->hit($dmg);
                if(!$pokemon->isAlive()){
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getBadges():int
    {
        return $this->badges;
    }

    public function __toString()
    {
        $pokemonCount=0;
        foreach ($this->pokemons as $pokemonsByType){
            $pokemonCount += count($pokemonsByType);
        }
        return $this->name.' '.$this->badges.' '.$pokemonCount.PHP_EOL;
    }
}