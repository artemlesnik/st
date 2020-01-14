<?php
namespace dev\Cart;

class Customer {
    protected $first_name = '';
    protected $last_name = '';
    protected $id;
    protected $adress1 = '';
    protected $adress2 = '';
    protected $city = '';
    protected $state = '';
    protected $zip;
    protected $addresses;


    public function __construct($id)
    {
        $this->setId($id);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $last_name
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAdress1()
    {
        return $this->adress1;
    }

    /**
     * @param mixed $adress1
     */
    public function setAdress1($adress1)
    {
        $this->adress1 = $adress1;
    }

    /**
     * @return mixed
     */
    public function getAdress2()
    {
        return $this->adress2;
    }

    /**
     * @param mixed $adress2
     */
    public function setAdress2($adress2)
    {
        $this->adress2 = $adress2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function setShippingAddress($address)
    {
        $this->setAdress1($address['address1']);
        $this->setAdress2($address['address2']);
        $this->setCity($address['city']);
        $this->setState($address['state']);
        $this->setZip($address['zip']);
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getShippingAddress()
    {
        return $this->getAdress1() . PHP_EOL . $this->getAdress2()
            . PHP_EOL .  $this->getCity() . PHP_EOL . $this->getState() . ' ' . $this->getZip();
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }
}
?>

