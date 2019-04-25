<?php
$con=  new PDO('sqlite:'.__DIR__.'/data.sqlite');
$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>
