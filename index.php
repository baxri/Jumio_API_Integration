<?php

// Requre netverify lib
require 'netverify.php';

$netVerify = new netVerify();

$response = $netVerify->Initialzie();

if( !empty( $response->authorizationToken ) ){ ?>
	<script type="text/javascript" src="https://netverify.com/widget/jumio-verify/2.0/iframe-script.js"> </script>
	<script type="text/javascript"> 
	/*<![CDATA[*/ 
	JumioClient.setVars({ authorizationToken: '<?php echo $response->authorizationToken ?>' }).initVerify("JUMIOIFRAME"); /*]]>*/ 
	</script>	
	<div id="JUMIOIFRAME"></div>
<?php
}else{
	echo '<pre>';
	print_r($response);
	die;
}

