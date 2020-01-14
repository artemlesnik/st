<?php
namespace dev\Cart;

class Item {
    protected $id;
    protected $name;
    protected $quantity;
    protected $price;

    /**
     * Item constructor.
     * @param $id
     * @param $name
     * @param $quantity
     * @param $price
     */
    public function __construct($id, $name, $quantity, $price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setQuantity($quantity);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

?>
