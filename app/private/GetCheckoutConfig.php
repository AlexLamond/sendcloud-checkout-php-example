<?php

/**
 * Summary of CheckoutConfig
 */
class CheckoutConfig {

    static private $base_url = "https://panel.sendcloud.sc/api/v2/checkout/configurations/";
    private $url;
    private $key;
    private $secret;
    /**
     * Summary of __construct
     * @param string $configid
     * @param string|null $apikey
     * @param string|null $apisecret
     */

    function __construct(? string $checkoutid, ? string $apikey, ? string $apisecret)
    {
        Functions::setEnvVars();

        $this->url = empty($checkoutid) ? self::$base_url.$_ENV['CHECKOUT_ID']."/delivery-options" : self::$base_url.$checkoutid."/delivery-options" ;
        $this->key = empty($apikey) ? $_ENV['API_KEY'] : $apikey;
        $this->secret = empty($apisecret) ? $_ENV['SECRET_KEY'] : $apisecret;
    }
    /**
     * Summary of getAllDeliveryOptions
     * @return string
     */
    public function getAllDeliveryOptions(string $to_country, int $weight): array
    {
        $key = CheckoutConfig::generateApiKey();

        $body = ["from_country" => "NL", "to_country" => $to_country, "value" => 0, "weight" => $weight];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."?".http_build_query($body));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD,$key);
        $response = json_decode(curl_exec($ch), true);
        self::checkResponse($response);
        return $response;
    }
    /**
     * Summary of generateApiKey
     * @return string
     */
    private function generateApiKey(): string
    {
        return $this->key.":".$this->secret;
    }
    private function checkResponse($response){
        if(!isset($response['delivery_options']))
        {
            throw new Exception("No delivery options have been specified. Please configure dynamic checkout first");
        }
    }
}

?>