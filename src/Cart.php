<?php

namespace dev\Cart;

use dev\Cart\Customer;
use Exception;

class Cart {
    private static $instances = [];
    protected $items = [];
    protected $tax_value = 0.07;
    protected $customer;

    /**
     * @param $id
     * @param Customer $customer
     * @return mixed
     * @throws Exception
     */
    public static function getInstance($id, Customer $customer)
    {
        if (empty($id)) {
            throw new Exception("Please set cart id");
        }

        if (!array_key_exists($id, self::$instances)) {
            self::$instances[$id] = new self($customer);
        }

        return self::$instances[$id];
    }

    /**
     * Cart constructor.
     * @param Customer $customer
     */
    private function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    private function __clone()
    {
    }

     /**
     * Adds a new item to the cart
     *
     * @param Item $item
     */
     public function addItem(Item $item)
     {
        $id = $item->getId();
        if (isset($this->items[$id]['item'])) {
            $this->updateItem($id, $this->items[$id]['item']->getQuantity() + $item->getQuantity());
        } else {
            $this->items[$id] = ['item' => $item];
        }
     }

    /**
     * @param Item $item
     * @param $qty
     */
    private function updateItem($id, $qty)
     {
        $this->items[$id]['item']->setQuantity($qty);
     }

    /**
     * @return array|string
     */
    public function getItems()
     {
         if (count($this->items) > 0) {
             return $this->items;
         } else {
             return "No items in cart";
         }
     }

    /**
     * @return float|int
     */
    public function getCartSubtotal()
     {
         $sum = 0;

         foreach ($this->items as $item)
         {
             $item_price = $item['item']->getPrice() * $item['item']->getQuantity();
             $sum += $item_price;
         }

         return $sum;
     }

    /**
     * @return float
     */
    private function getTaxValue()
     {
         return $this->tax_value;
     }

    /**
     * @return float|int
     */
    private function calculateShippingCost()
     {
         return $this->shippingPriceApiEmulator($this->customer->getZip());
     }

    /**
     * @param $zip_code
     * @return float|int
     */
    private function shippingPriceApiEmulator($zip_code)
     {
         if ($zip_code == 61821)
         {
             return 4.99;
         }

         if ($zip_code == 61820)
         {
             return 7.50;
         }

         return 10;
     }

    /**
     * @return float|int
     */
    public function getCartTotal()
     {
         $subtotal = $this->getCartSubtotal();
         return ($subtotal * $this->getTaxValue() + $subtotal) + $this->calculateShippingCost();
     }

    /**
     * @return mixed
     */
    public function getSingleItemPrice($id, $tax = true, $shipping = true)
    {
        $item_price =  $this->items[$id]['item']->getPrice();
        if ($tax) {
            $item_price = ($item_price * $this->tax_value) + $item_price;
        }
        if ($shipping) {
            $item_price += $this->calculateShippingCost();
        }

        return $item_price;

    }

    /**
     * @return mixed
     */
    public function getCartCustomerName()
     {
         return $this->customer->getFullName();
     }

    /**
     * @return mixed
     */
    public function getCustomerAddresses()
     {
         return $this->customer->getAddresses();
     }

    /**
     * @return mixed
     */
    public function getShippingAddress()
     {
         return $this->customer->getShippingAddress();
     }
}
?>
