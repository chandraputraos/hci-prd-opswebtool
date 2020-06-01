<?php require '../db_schema/pgid_mobapp.php';
$connect_oci=connect();

$query = oci_parse($connect_oci," SELECT PD.contract_number  from APP_MOBILE.MOB_CLIENT_ALDI CA
 join app_pportal.pp_contract_Data PD on ca.application_code = PD.contract_number
 where ca.created_date >=  sysdate -3 and pd.status = 'IN_PREPROCESS' AND CA.STATUS_DESC = 'Waiting for pre-approval'");

OCIExecute($query);

//Get All data Unsync
while ($row = oci_fetch_array($query))
	{
	
	 $hasil[]=$row[0];
		};
		
//Array formater		
$data = json_encode( $hasil);

$convert = str_replace('"', "'", $data);

echo $hit_result= json_encode(array('Hit Contract Result' => $convert));

//Endpoint
$url = 'https://portal.homecredit.co.id/hosel-integration/endpoints/ApplicationNotification';

$result=[];

// Loop Function
 foreach ($hasil as $kontrak) {

    $xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
 xmlns:v1="http://homecredit.net/hss/application-notification/v1" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:ApplicationNotificationRequest>
         <v1:applicationNotification xsi:type="v1:ApplicationPreApprovedNotification">
            <v1:applicationCode>'.$kontrak.'</v1:applicationCode>
         </v1:applicationNotification>
      </v1:ApplicationNotificationRequest>
   </soapenv:Body>
</soapenv:Envelope>';

 
//Identify what we send and request response to server
       $headers = array(
                    "Content-type: text/xml;charset=\"utf-8\"",
                    "Accept: text/xml",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    "Content-length: ".strlen($xml_post_string),
                );

        // PHP cURL Method to execute
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		//execute
        $response = curl_exec($ch);
		//catch if error 
		$err = curl_error($ch);
		
        curl_close($ch);
		
		if ($err) {
    echo "Hit Error #:" . $err;
} else {
    print_r(json_decode($response));
}
 
		
 }
 
 ?>
