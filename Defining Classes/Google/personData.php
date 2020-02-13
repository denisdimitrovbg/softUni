<?php


class personData
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $company;

    /**
     * @var array
     */
    private $pokemon;

    /**
     * @var array
     */
    private $parents;

    /**
     * @var
     */
    private $children;

    /**
     * @var array
     */
    private $car;


    /*$company=null, $pokemon=null, $car=null, $parents=null, $children=null*/

    /**
     * personData constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->company['company']='';
        $this->company['department']='';
        $this->company['salary']= '';
        $this->pokemon=[];
        $this->parents=[];
        $this->children=[];
        $this->car['model']='';
        $this->car['speed']='';

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
    private function setName(string $name):void
    {
        $this->name=$name;
    }

    /**
     * @param string $company
     */
    public function addCompany(string $company, string $department, float $salary):void
    {
        $this->company['company']= $company;
        $this->company['department']=$department;
        $this->company['salary']=(float) $salary;
    }

    public function getCompany():array
    {
        return $this->company;
    }

    /**
     * @param string $name
     * @param string $type
     */
    public function addPokemon(string $name, string $type):void
    {
        $this->pokemon[$name][]=$type;
    }

    /**
     * @return array
     */
    public function getPokemons():array
    {
        return $this->pokemon;
    }

    /**
     * @param string $name
     * @param string $birthday
     */
    public function addParent(string $name, string $birthday):void
    {
        $this->parents[$name][]=$birthday;
    }

    /**
     * @return array
     */

    public function getParents():array
    {
        return $this->parents;
    }

    /**
     * @param string $name
     * @param string $birthday
     */
    public function addChildren(string $name, string $birthday):void
    {
        $this->children[$name][]=$birthday;
    }

    /**
     * @return array
     */
    public function getChildren():array
    {
        return $this->children;
    }


    /**
     * @param string $model
     * @param int $speed
     */
    public function addCar(string $model, int $speed):void
    {
        $this->car['model']=$model;
        $this->car['speed']=(int) $speed;
    }

    /**
     * @return array
     */
    public function getCar():array
    {
        return $this->car;
    }

    public function __toString()
    {
        $company= $this->getCompany();
        $car= $this->getCar();
        $pokemon = $this->getPokemons();
        $pokemons='';
        $parents=$this->getParents();
        $parentList='';
        $childrens = $this->getChildren();
        $childrenList='';

        foreach ($pokemon as $name => $type ){
            $pokemons .=$name.' '.$type[0].PHP_EOL;
        }

        foreach ($parents as $name => $birthday){
            $parentList .= $name.' '.$birthday[0].PHP_EOL;
        }

        foreach ($childrens as $name => $birthday){
            $childrenList .= $name.' '.$birthday[0].PHP_EOL;
        }


        return $this->getName().PHP_EOL.
            'Company:'.PHP_EOL.
            $company['company'].' '.$company['department'].' '.$company['salary'].PHP_EOL.
            'Car:'.PHP_EOL.
            $car['model'].' '.$car['speed'].PHP_EOL.
            'Pokemon:'.PHP_EOL.
            $pokemons.
            'Parents:'.PHP_EOL.
            $parentList.
            'Children:'.PHP_EOL.
            $childrenList;
        }

}