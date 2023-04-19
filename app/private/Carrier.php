<?php

/**
 * Summary of Carrier
 */
Class Carrier
{
    public $name;
    public $logo_url;
    public $code;
    /**
     * Summary of __construct
     * @param array $carrier
     */
    function __construct(array $carrier)
    {
        $this->name = $carrier['name'];
        $this->logo_url = $carrier['logo_url'];
        $this->code = $carrier['code'];
    }
}