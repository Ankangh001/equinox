<?php
require 'vendor/autoload.php';
use Square\SquareClient;

class LocationInfo {
  var $currency;
  var $country;
  var $location_id;

  function __construct() {
    $this->CI =& get_instance();
    $access_token =  SQUARE_ACCESS_TOKEN;
    $this->square_client = new SquareClient([
      'accessToken' => $access_token,  
      'environment' => SQUARE_ENVIRONMENT
    ]);
    $location = $this->square_client->getLocationsApi()->retrieveLocation(SQUARE_LOCATION_ID)->getResult()->getLocation();
    $this->location_id = $location->getId();
    $this->currency = $location->getCurrency();
    $this->country = $location->getCountry();  
  }

  public function getCurrency() {
    return $this->currency;
  }

  public function getCountry() {
    return $this->country;
  }

  public function getId() {
    return $this->location_id;
  }
}
?>