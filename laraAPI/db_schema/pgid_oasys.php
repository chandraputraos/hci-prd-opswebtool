<?php
function connect() {
    $db_schema = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=PDIDCL02.ID.PROD)(PORT = 1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=PGID_OASYS.HOMECREDIT.ID)))';
    $connect_oci = OCILogon('APP_OASYS','OASysF0r3ve12',$db_schema);
 
    if (!$connect_oci) {
   die("Database Connection Error");
}
	 
 
return $connect_oci;

}
	

?>