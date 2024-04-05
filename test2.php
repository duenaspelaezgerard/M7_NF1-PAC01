<?php

require("class.pdofactory.php");
print "Running ...< br />";

$strDSN = "pgsql:dbname=usuaris; host=localhost;port=5432;user=postgres;password=postgres";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    
    $strQuery1 = "INSERT INTO Customers (id, store_id, first_name, last_name, email, address_id) VALUES (
    DEFAULT, 1, 'Fernando', 'García', 'fernando@example.com', 1)";
    $strQuery2 = "INSERT INTO Customers (id, store_id, first_name, last_name, email, address_id) VALUES (
     1, 'Pedro', 'López', 'pedro@example.com', 1)";

    $objPDO->beginTransaction();

    $objPDO->exec($strQuery1);
    $objPDO->exec($strQuery2);

    // commit the transaction
    $objPDO->commit();

} catch (Exception $e) {

    // rollback the transaction
    $objPDO->rollBack();
    echo "Failed: ".$e->getMessage();
}
?>