<?php

// PDF dosyasının konumu ve ismi
$pdf_file = 'example.pdf';

// PNG dosyasının konumu ve ismi
$png_file = 'example.png';

// PDF dosyasından PNG dosyası oluşturmak için ImageMagick'ı kullanın
$command = 'convert -density 150 -quality 90 ' . escapeshellarg($pdf_file) . ' ' . escapeshellarg($png_file);

// Komutu çalıştırın
$output = shell_exec($command);

// PNG dosyasından JPG dosyası oluşturmak için GD kütüphanesini kullanın
$jpg_file = 'example.jpg';

// PNG dosyasını yükle
$png = imagecreatefrompng($png_file);

// Boyutu al
list($width, $height) = getimagesize($png_file);

// Yeni bir JPEG görüntüsü oluşturun
$jpg = imagecreatetruecolor($width, $height);

// PNG görüntüsünü JPEG görüntüsüne kopyalayın
imagecopy($jpg, $png, 0, 0, 0, 0, $width, $height);

// JPEG dosyasını oluşturun
imagejpeg($jpg, $jpg_file, 90);

// Belleği temizle
imagedestroy($png);
imagedestroy($jpg);

?>
