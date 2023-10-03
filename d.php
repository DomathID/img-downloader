<?php
if (isset($argv[1])) {
    $url = $argv[1];
} else {
    echo "URL folder gambar tidak ditemukan.";
    exit;
}

$folder = 'hasil/';
$fileList = file_get_contents($url);
preg_match_all('/<a href="([^"]+\.(?:jpg|jpeg|png|gif))"/i', $fileList, $matches);

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}
foreach ($matches[1] as $filename) {
    $fileUrl = $url . $filename;
    $outputFile = $folder . $filename;
    file_put_contents($outputFile, file_get_contents($fileUrl));
    echo "File $filename berhasil diunduh dan disimpan di folder $folder." . PHP_EOL;
}

echo "Proses download selesai.";

?>


