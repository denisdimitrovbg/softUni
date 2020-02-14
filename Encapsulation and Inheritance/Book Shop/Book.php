<?php


class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var float
     */
    private $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $author, string $title, float $price)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getTitle():string {
      return  $this->title;

    }

    /**
     * @param string $title
     * @throws Exception
     */
    private function setTitle(string $title):void{
        if (strlen($title) < 3 ) {
            throw new Exception("Title not valid!");
        }

        $this->title=$title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param $author
     * @throws Exception
     */
    private function setAuthor($author):void{
        if (is_numeric(explode(" ",$author)[1][0])){
            throw new Exception("Author not valid!");
        }
        $this->author=$author;
    }

    /**
     * @return float
     */
    public function getPrice():float{
        return $this->price;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    private function setPrice(float $price):void
    {
    if($price <= 0){
        throw new Exception("Price not valid!");
    }
        $this->price=$price;
    }

}