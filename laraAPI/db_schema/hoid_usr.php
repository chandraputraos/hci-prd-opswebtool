<?php
function connect() {
    $db_schema = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=PDIDCL02.ID.PROD)(PORT = 1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=HOID_USR_DEFAULT.HOMECREDIT.ID)))';
    $connect_oci = OCILogon('HCID_CHANDRAOSUNGGU','Pj4Z5AonqTDj',$db_schema);
 
    if (!$connect_oci) {
   die("Database Connection Error");
}
	 
 
return $connect_oci;

}
	

?>