<?php
function connect() {
    $db_schema = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=PDIDCL02.ID.PROD)(PORT = 1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=MEID.HOMECREDIT.ID)))';
    $connect_oci = OCILogon('HCID_CHANDRAOSUNGGU','1DFmrbCuYZJW',$db_schema);
 
    if (!$connect_oci) {
   die("Database Connection Error");
}
	 
 
return $connect_oci;

}
	

?>