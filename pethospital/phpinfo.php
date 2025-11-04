<?php
echo "Loaded php.ini: " . php_ini_loaded_file() . "<br>";
echo "Extension dir: " . ini_get("extension_dir") . "<br>";
print_r(PDO::getAvailableDrivers());
?>
