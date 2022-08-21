<?php
function conn() {
        try {

            $server         = "localhost";
            $db_username    = "kmc";
            $db_password    = "azaz";
            $service_name   = "BAHRIA";
            $sid            = "BAHRIA";
            $port           = 1521;
            $dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

            //$this->dbh = new PDO("mysql:host=".$server.";dbname=".dbname, $db_username, $db_password);
            return $dbh = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $db_username, $db_password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));

        } catch (PDOException $e) {
            echo $e->getMessage();
        }  

    function __destruct() {
        $this->dbh = NULL;
    }

}






//SELECT
/**
$conn = oci_connect('scott', 'tiger', 'localhost/orcl', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		else echo "connection successful";
		$sql = 'begin brand_sale_in_year(2017,:a,:b); end;';

$stid = oci_parse($conn,$sql);
//$stid = oci_parse($dbh, 'begin brand_sale_in_year(:c,:a,:b);end;');
//oci_bind_by_name($stid,':c',$c,32);
oci_bind_by_name($stid,':a',$a,32);
oci_bind_by_name($stid,':b',$b,40);
$c = '2016';
oci_execute($stid);

//print "$b\n";   // prints 16
print "$b\n$a\n";
//oci_free_statement($stid);
//oci_close($conn);
**/
//SELECT END

/**
$conn = oci_connect('scott', 'tiger', 'localhost/orcl', 'AL32UTF8');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		else echo "connection successful";
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin get_emp_rs('2016',:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);

oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo $row['BRAND'] . "<br />\n" . $row['YEAR'] . "<br />\n" . $row['TOTAL'];
}
oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);


**/
  /** $tablename = 'car';
   $columnname = 'car_id';

   $query = "begin 
               :cursor := selectFromTable(:tabl, :colm);
             end;";

   $stid = oci_parse($conn, $query);

   $p_cursor = oci_new_cursor($conn);

   oci_bind_by_name($stid, ":tabl", $tablename);
   oci_bind_by_name($stid, ":colm", $columnname);

   oci_bind_by_name($stid, ":cursor", $p_cursor, -1, OCI_B_CURSOR);

   oci_execute($stid);
   oci_execute($p_cursor, OCI_DEFAULT);

   while (($row = oci_fetch_array($p_cursor, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
      echo $row['car_id'] . "<br />\n";
   }


**/

//INSERT
function insert($table, $columnsArray) {

try{
	$dbh=conn();
$a = array();
$c = "";
$v = "";
foreach ($columnsArray as $key => $value) {
$c .= $key. ", ";
$v .= ":".$key. ", ";
$a[":".$key] = $value;
}
$c = rtrim($c,', ');
$v = rtrim($v,', ');
			
$stmt = $dbh->prepare("INSERT INTO $table($c) VALUES($v)");

$stmt->execute($a);
$affected_rows = $stmt->rowCount();
$response["status"] = "success";
$response["message"] = $affected_rows." row inserted into database";
}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = 'Insert Failed: ' .$e->getMessage();
}
return $response;
}

//UPDATE
function update($table, $columnsArray, $where){
try{
	$dbh=conn();
$a = array();
$w = "";
$c = "";
foreach ($where as $key => $value) {
$w .= " and " .$key. " = :".$key;
$a[":".$key] = $value;
}
foreach ($columnsArray as $key => $value) {
$c .= $key. " = :".$key.", ";
$a[":".$key] = $value;
}
$c = rtrim($c,", "); 									
$stmt = $dbh->prepare("UPDATE $table SET $c WHERE 1=1 ".$w);
$stmt->execute($a);
$affected_rows = $stmt->rowCount();
if($affected_rows<=0){
$response["status"] = "warning";
$response["message"] = "No row updated";
}else{
$response["status"] = "success";
$response["message"] = $affected_rows." row(s) updated in database";
}
}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = "Update Failed: " .$e->getMessage();
}
return $response;
}


//SELECT

//On new page:
//$response=select("foods",array()); OR
//$response=select("foods",array('food'=>'orange'));
//print_r($response['data']);
//echo $response[data][2]['id'];
//foreach($response['data'] as $value){ echo $value['food']}
function select($table,$where){
try{
$dbh=conn();
$a = array();
$w = "";	
$c = "";
foreach ($where as $key => $value) {
$w .= " and " .$key. " like :".$key;
$a[":".$key] = $value;
}

 									
$stmt = $dbh->prepare("SELECT * from $table WHERE 1=1 ".$w);
$stmt->execute($a);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows<=0){
$response["status"] = "warning";
$response["message"] = "No data found";
}else{
$response["status"] = "success";
$response["message"] = " Data selected from database";
}
$response["data"]=$rows;
}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = "Selection Failed: " .$e->getMessage();
$response["data"]=null;
}
return $response;
}




//DELETE

function delete($table, $where){
if(count($where)<=0){
$response["status"] = "warning";
$response["message"] = "Delete Failed: At least one condition is required";
}else{
try{
$dbh=conn();
$a = array();
$w = "";
foreach ($where as $key => $value) {
$w .= " and " .$key. " = :".$key;
$a[":".$key] = $value;
}
$stmt = $dbh->prepare("DELETE FROM $table WHERE 1=1 ".$w);
$stmt->execute($a);
$affected_rows = $stmt->rowCount();
if($affected_rows<=0){
$response["status"] = "warning";
$response["message"] = "No row deleted";
}else{
$response["status"] = "success";
$response["message"] = $affected_rows." row(s) deleted from database";
}
}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = 'Delete Failed: ' .$e->getMessage();
}
}
return $response;
$dbh=null;
}


//SELECT

//On new page:
//$response=select("foods",array()); OR
//$response=select("foods",array('food'=>'orange'));
//print_r($response['data']);
//echo $response[data][2]['id'];
//foreach($response['data'] as $value){ echo $value['food']}
function select_count($table,$where){
try{
$dbh=conn();
$a = array();
$w = "";	
$c = "";
foreach ($where as $key => $value) {
$w .= " and " .$key. " like :".$key;
$a[":".$key] = $value;
}

 									
$stmt = $dbh->prepare("SELECT COUNT(*) AS `count` from $table WHERE 1=1 ".$w);
$stmt->execute($a);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows<=0){
$response["status"] = "warning";
$response["message"] = "No data found";
}else{
$response["status"] = "success";
$response["message"] = " Data selected from database";
$response["data"]=$rows;
}
$response["data"]=$rows;

}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = "Selection Failed: " .$e->getMessage();
$response["data"]=null;
}
return $response;
}

function select_cars($table,$where){
try{
$dbh=conn();
$a = array();
$w = "";	
$c = "";
foreach ($where as $key => $value) {
$w .= " and " .$key. " like :".$key;
$a[":".$key] = $value;
} 									
$stmt = $dbh->prepare("SELECT * from CARS_FOR_SALE cs, ORDERS os WHERE 1=1 and os.CAR_ID != cs.CAR_ID".$w);
$stmt->execute($a);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows<=0){
$response["status"] = "warning";
$response["message"] = "No data found";
}else{
$response["status"] = "success";
$response["message"] = " Data selected from database";
}
$response["data"]=$rows;
}catch(PDOException $e){
$response["status"] = "error";
$response["message"] = "Selection Failed: " .$e->getMessage();
$response["data"]=null;
}
return $response;
}
?>
 