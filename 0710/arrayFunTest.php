<?php
$fname = "Eliz";
$sname = 'wind';
$address = "Bukingham";
$city = "London";
$country = "United Kindom";

$contact = compact('fname', 'sname', 'address', 'city', 'country');
echo "<pre>";
print_r($contact);
foreach ($contact as $item => $description) {
    echo "$item : $description <br/>";
}

