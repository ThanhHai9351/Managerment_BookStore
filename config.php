<?php

function isValidEmail($email) {
    // Sử dụng biểu thức chính quy để kiểm tra tính hợp lệ của email
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}