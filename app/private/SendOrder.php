<?php

/**
 * Summary of Order
 */
Class Order
{  
    private $name;
    private $house_number;
    private $address;
    private $city;
    private $postal_code;
    var $telephone;
    var $country;
    static $request_label = false;
    static $is_return = false;
    var $parcel_handover_date;
    static $quantity = 1;
    var $shipment_id;
    var $weight;
    static $order_number = random_bytes(32);
    static $url = "https://panel.sendcloud.sc/api/v2/parcel";

    /**
     * Summary of __construct
     * @param mixed $name
     * @param mixed $house_number
     * @param mixed $address
     * @param mixed $city
     * @param mixed $postal_code
     * @param mixed $telephone
     * @param mixed $country
     * @param mixed $parcel_handover_date
     * @param mixed $weight
     */
    function __construct($name, $house_number, $address, $city, $postal_code, $telephone, $country, $parcel_handover_date, $weight){
        $this->name = $name;
        $this->house_number = $house_number;
        $this->address = $address;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->telephone = $telephone;
        $this->country = $country;
        $this->parcel_handover_date = $parcel_handover_date;
        $this->weight = $weight;
    }

    function Create(): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->ParamsToHTTP());
        $result = curl_exec($ch);
        return $result;

    }

    function ParamsToHTTP(): string
    {
        $body = ["parcel"=>["name"=>$this->name,"house_number"=>$this->house_number,"address"=>$this->address,"city"=>$this->city,"postal_code"=>$this->postal_code,"telephone"=>$this->telephone,"country"=>$this->country,"request_label"=>$this->request_label,"is_return"=>$this->is_return,"parcel_handover_date"=>$this->parcel_handover_date,"quantity"=>$this->quantity,"shipment_id"=>$this->shipment_id,"weight"=>$this->weight,"order_number"=>$this->order_number]];
        return http_build_query($body);
    }
}