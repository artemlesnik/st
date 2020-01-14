<?php

include_once ('src/Cart.php');
include_once ('src/Customer.php');
include_once ('src/Item.php');

use dev\Cart\Cart;
use dev\Cart\Item;
use dev\Cart\Customer;


$data = array (  
    array (
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => array (  
            array (
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (  
            array (
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Hemingway',
        'gender' => 'M',
        'guest_booking' => array (  
            array (
                'booking_number' => 10000013,
                'room_no' => 'B0092',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (  
            array (
                'account_id' => 10000522,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => array (  
            array (
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (  
            array (
                'account_id' => 10000013,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => array (  
            array (
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (  
            array (
                'account_id' => 10000519,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
    array (
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => array (  
            array (
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true,
            ),
        ),
        'guest_account' => array (  
            array (
                'account_id' => 10000015,
                'account_limit' => 300,
                'allow_charges' => true,
            ),
        ),
    ),
);

# Question 1 function
function display_array_to_user($arr, $level = 0)
{
    if (is_array($arr)) {
        foreach($arr as $key => $value) {
            for ($i = 0; $i < $level; $i++) {
                echo "\t";
            }
            if (is_array($value)) {
                if (is_string($key)) {
                    echo $key . ':';
                }
                if ($level == 0 ) {
                    echo 'Guest id profile:' . PHP_EOL;
                }
                echo PHP_EOL;
                display_array_to_user($value, $level + 1);
            } else {
                echo $key . ":\t" . $value. PHP_EOL;
            }
        }
    }
}

// Execution
//display_array_to_user($data);


/** Question 2
 * I want to be honest, I didn't't succeed to find working solution. Usually, I do sortig of data on the db level using SQL.
 * I was looking to use array_multisort() function but didn't succeed with it.
 */


# Question 3
function cart()
{
    $addresses = [[
        'address1' => 'Linkoln street',
        'address2' => '',
        'city' => 'Champaign',
        'state' => 'IL',
        'zip' => 61821
    ], [
        'address1' => 'Mattis ave',
        'address2' => 'F100',
        'city' => 'Champaign',
        'state' => 'IL',
        'zip' => 61820
    ]];

    $customer = new Customer(99);
    $customer->setFirstName('David');
    $customer->setLastName('Anderson');
    $customer->setAddresses($addresses);
    $customer_addresses = $customer->getAddresses();
    $customer->setShippingAddress($customer_addresses[0]);

    $item1 = new Item('1', 'Test', 1, 100);
    $item2 = new Item('1', 'Test', 2, 100);
    $item3 = new Item('2', 'Test', 1, 50);

    $cart = Cart::getInstance($customer->getId(), $customer);
    $cart->addItem($item1);
    $cart->addItem($item2);
    $cart->addItem($item3);

    //- Customer Name
    var_dump($cart->getCartCustomerName());

    //- Items in Cart
    var_dump($cart->getItems());

    //- Customer Addresses
    var_dump($cart->getCustomerAddresses());

    //- Where Order Ships
    var_dump($cart->getShippingAddress());

    //- Cost of item in cart, including shipping and tax
    var_dump($cart->getSingleItemPrice(1));

    //-- Subtotal
    var_dump($cart->getCartSubtotal());

    //--Total
    var_dump($cart->getCartTotal());
}

// Execution
//cart();
?>
