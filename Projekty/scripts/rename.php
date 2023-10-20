<!doctype html>
<html>
<head>
<title>RENAMING SCRIPT</title>
<meta name="description">
<meta name="keywords">
</head>
<body>
<?php
// Define the folder path where the PDF files are stored
$folderPath = 'C:/wamp64/www/navody/online_navody';

// Get a list of all the folders in the folder path
$folders = array_diff(scandir($folderPath), array('.', '..'));

// Loop through each folder and rename the PDF files in the root folder
foreach ($folders as $folder) {
    // Check if the current item is a folder
    if (!is_dir($folderPath . '/' . $folder)) {
        continue;
    }

    $pdfFiles = glob($folderPath . '/' . $folder . '/*.pdf');

    echo "PDF files in " . $folder . ": " . implode(", ", $pdfFiles) . "<br>";
    foreach ($pdfFiles as $pdfFile) {
        if (basename(dirname($pdfFile)) !== $folder) {
            continue;
        }
        echo "Current file: " . $pdfFile . "<br>";

        // Get the original filename of the PDF file
        $originalFilename = basename($pdfFile);
        $newFilename = preg_replace('/(\d+)\.(\d+)\s+([\w\s,&()-éÉíÍóÓúÚÁá]+)\.pdf/', '$1_$2.pdf', $originalFilename);

        if (file_exists($pdfFile)) {
            $renamed = rename($pdfFile, $folderPath . '/' . $folder . '/' . $newFilename);

            if ($renamed) {
                echo "<span style='background-color:yellow;'>Renamed file: " . $pdfFile . " -> " . $newFilename . "</span><br>";
            } else {
                echo "<span style='color:red;'>File not renamed: " . $pdfFile . "</span><br>";
            }
        } else {
            echo "File not found: " . $pdfFile . "<br>";
        }
    }
}
// Define the folder path where the PDF files are stored
$folderPath = 'C:/wamp64/www/navody/online_navody';

// Get a list of all the folders in the folder path
$folders = array_diff(scandir($folderPath), array('.', '..'));

// Loop through each folder and rename the PDF files in the root folder
foreach ($folders as $folder) {
    // Check if the current item is a folder
    if (!is_dir($folderPath . '/' . $folder)) {
        continue;
    }

    // Delete files in Archív subfolder
    $archivFolder = $folderPath . '/' . $folder . '/Archív';
    if (is_dir($archivFolder)) {
        $archivFiles = glob($archivFolder . '/*');
        foreach ($archivFiles as $archivFile) {
            if (is_file($archivFile)) {
                $deleted = unlink($archivFile);
                if ($deleted) {
                    echo "Deleted file: " . $archivFile . "<br>";
                } else {
                    echo "File not deleted: " . $archivFile . "<br>";
                }
            }
        }
    }

    // Delete Archív subfolder
    if (is_dir($archivFolder)) {
        $deleted = rmdir($archivFolder);
        if ($deleted) {
            echo "<span style='color:red;'>Removed folder: " . $archivFolder . "</span><br>";
        } else {
            echo "Folder not removed: " . $archivFolder . "<br>";
        }
    }
}
?>
    Content goes here.
</body>
</html>