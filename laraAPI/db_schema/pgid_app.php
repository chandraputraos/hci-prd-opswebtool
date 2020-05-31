<?php
function connect() {
    $db_schema = '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=pdidcl02.id.prod)(PORT = 1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=PGID_APP_DEFAULT.HOMECREDIT.ID)))';
    $connect_oci = OCILogon('HCID_ITOC','W8x25CVdX9rL',$db_schema);
 
    if (!$connect_oci) {
   die("Database Connection Error");
}
	 
 
return $connect_oci;

}
	

?>