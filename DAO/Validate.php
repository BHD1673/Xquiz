<?php 

// function validateFormData($postData) {
//     $errors = [];

//     // Kiểm tra cơ bản
//     if (empty($postData['categoryName'])) {
//         $errors[] = "Tên danh mục là bắt buộc.";
//     } elseif (strlen($postData['categoryName']) > 255) {
//         $errors[] = "Tên danh mục phải ít hơn 255 ký tự.";
//     }

//     if (empty($postData['categoryDescription'])) {
//         $errors[] = "Mô tả danh mục là bắt buộc.";
//     } elseif (strlen($postData['categoryDescription']) > 1000) {
//         $errors[] = "Mô tả danh mục phải ít hơn 1000 ký tự.";
//     }

//     return empty($errors) ? true : $errors;
// }

// function validateFormDataAddNewItemCategory($postData) {
//     $errors = [];

//     //Kiểm tra cơ bản
//     if (empty($postData['categoryName'])) {
//         $error[] = "Tên danh mục không được để thiếu";
//     } elseif (strlen($postData['categoryName']) < 5) {
//         $error[] = "Tên danh mục phải ít nhất 5 ký tự"
//     }
// }
?>