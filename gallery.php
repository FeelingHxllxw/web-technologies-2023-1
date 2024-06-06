<?php
$target_dir = __DIR__ . DIRECTORY_SEPARATOR . "Галерея" . DIRECTORY_SEPARATOR;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = $target_dir . '/' . $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "Выбранный файл не является изображением";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Такая картинка уже есть";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 400000) {
    echo "Слишком большое изображение (максимум 400 КБ)";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Поддерживаеме форматы: png, jpg, jpeg";
    $uploadOk = 0;
}

if ($uploadOk) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $name)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Произошла ошибка при загрузке файла.";
    }
}
?>