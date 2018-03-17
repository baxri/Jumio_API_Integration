<?php


class netVerify{

	private $rest_url = 'https://netverify.com/api/netverify/v2/initiateNetverify';
	private $user_id = '91ce9494-ebda-4329-a526-96fa839dbc2134';
	private $password = 'N1P1pOWvHShyRteHBjy9gWJbba3ClYUmgh';

	public function __construct(){

	}


	public function Initialzie(){
	   
      $curl = curl_init($this->rest_url);
      $curl_post_data = array(       
        	"merchantIdScanReference" => '9879878',
          "successUrl" => '',
          "errorUrl" => '',
      );      

      //initiateNetverify
      $curl_post_data = json_encode($curl_post_data);

      curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt( $curl, CURLOPT_USERPWD, $this->user_id.':'.$this->password ); 
      curl_setopt( $curl, CURLOPT_POST, true);
      curl_setopt($curl,  CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, 0);

      curl_setopt( $curl, CURLOPT_HTTPHEADER, array(
      'Accept: application/json',
      'Content-Type: application/json',
      'User-Agent: UniPAY JVerify/1.0.0'
      ));

      curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

      $curl_response = curl_exec($curl);
      $info = curl_getinfo($curl);
      $error = curl_error($curl);
      curl_close($curl);
    
      return json_decode($curl_response);
	}

}

