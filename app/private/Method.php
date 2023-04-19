<?php

/**
 * Summary of CheckoutMethod
 */
Class CheckoutMethod
{
    public $id;
    public $title;
    public $description;
    public $cut_off_time;
    public $checkoutMethodPrice;
    public array $checkoutDates;
    /**
     * Summary of __construct
     * @param array $method
     */
    function __construct(array $method)
    {
        $this->id = $method['id'];
        $this->title = $method['title'];
        $this->description = $method['description'];
        $this->cut_off_time = $method['cut_off_time'];
        $this->checkoutMethodPrice = new CheckoutMethodPrice($method['shipping_rate']);
        $this->checkoutDates = isset($method['delivery_dates']) ? $method['delivery_dates'] : [["delivery_date"=> "Anytime", "parcel_handover_date" => "Anytime"]];
    }
}

/**
 * Summary of CheckoutMethodPrice
 */
Class CheckoutMethodPrice extends CheckoutMethod
{
    public $price;
    public $currency;
    /**
     * Summary of __construct
     * @param array $rate
     */
    function __construct(array $rate)
    {
        
        $this->price = isset($rate['price']) ? $rate['price'] : 0;
        $this->currency = $rate['currency'];
    }
}