<?php
$priceobj= '{"Nasi Pecel":5000,"Nasi Padang":15000,"Nasi Bakar":10000}';

$obj = json_decode($priceobj);

echo $obj->Peter;
echo $obj->Ben;
echo $obj->Joe;

?>
