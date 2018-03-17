<?php


class netVerify{

	private $rest_url = 'https://netverify.com/api/netverify/v2/test';
	private $user_id = '35345535-34543-4329-3454-3453535354345';
	private $password = 'jshdbfsjfskajdfhbsfkjhsdbfkdsjbfkjf;

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

