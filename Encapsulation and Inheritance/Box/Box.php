<?php


/**
 * Class box
 */
class box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct( float $length, float $width, float $height )
    {
        $this->setHeight($height);
        $this->setLength($length);
        $this->setWidth($width);
    }


    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */

    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    private function setHeight(float $height):void
    {
        if ($height <= 0 ){
            throw new Exception('Height cannot be zero or negative');
        }
        $this->height=$height;
    }

    /**
     * @param float $length
     * @throws Exception
     */
    private function setLength(float $length):void
    { if ($length <= 0 ){
        throw new Exception('Length cannot be zero or negative');
    }
        $this->length=$length;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    private function setWidth(float $width):void
    {if ($width <= 0 ){
        throw new Exception('Width cannot be zero or negative');
    }

        $this->width=$width;
    }


    /**
     * @return float
     */

    public function getVolume (): float
    {
        return $this->getWidth() * $this->getHeight() * $this->getLength();

    }

    /**
     * @return float
     */
    public function getLateralSurface (): float
    {
        return 2*($this->getLength()*$this->getHeight()) + 2* ($this->getWidth()*$this->getHeight());
    }


    /**
     * @return float
     */
    public function getSurfaceArea(): float
    {
        return 2*($this->getLength()*$this->getWidth()) + 2*($this->getLength()*$this->getHeight()) + 2*($this->getWidth()*$this->getHeight());
    }

    public function __toString()
    {
        $volume = number_format($this->getVolume(),2,".","");
        $lateralSurface = number_format($this->getLateralSurface(),2,".","");
        $surfaceArea = number_format($this->getSurfaceArea(),2,".","");

        return "Surface Area - {$surfaceArea}\nLateral Surface Area - {$lateralSurface}\nVolume - {$volume}";
    }


}