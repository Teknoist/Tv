<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Yanıtın tipini belirtiyoruz (isteğe bağlı olarak JSON veya plain text seçilebilir)
    header('Content-Type: text/plain; charset=utf-8');

    $response = array(
        'code'     => '000000',
        'messages' => null,
        'data'     => 'J4i2I+V164jMPK/jR76F4IIdLf7K8LuoX35i4xyVyIFoVoIabT4wL5YE0rsRXzQ/1OsaDekbS2iCGyGAyXCWnOS5C84NbzhRZdJol+leC6xw0kuca0TljbuLvUmsFMU8q0CITGhkYvSPtCvHOqrLgjLcmH6ytHvvBlW0b798RZjDRrgt3jeaMC2qMcIwrYqCnftPm7rBZZNc/08f6lgw/zhpxRgswpYMSN9uNnZn9QZUVQ0XFqOtkyBUyxYLOvl3G6kbl4P12RTZZmFHuP0GSMcHvmWKh86a/SdNYddjq7tFnSWLlammQJ9KOm3UJtrxMSOPo4zp9OH4T2CZgYHPCyL+QPK1xGdSSY7+WRfpvpcNP60r7Y8FTEHhjm4L2irpzcMeexvJyVmELMpfavKf1bdsM5Lyj2O+ifK4ess/8FNDDUqLbMVM2DV3IIYQj36femS1/MbOTdW5UypNlg8Y+ShvglX0+nB1xCqT5R91kJTjIPfmhB7ozUE7QOXHynosXQQTGZYKfe/jOrs8QUwDHx5ug658GPrNBGFcronwY2lsnAxJUmty1RllqG97XBK0wwve+KU7ynKydhCPL949zUH4G8QhqhdnM5ZmBX+h1jEKWbw9e1rI71cEJc0ded4X7aOQeyS7cgx1dFOmWqasYjlEPmRJ7twKJEzctjiaTXIygDc9HmoOG33Cu6Hf/8ZK3XZzMhaXqaNeE5PQLfpI4sKhaYMWMYT5zgzjPx4x6tcgAcNTZLY8JlOTHr9jEX8JC3Y4wT+J9blj9n6KZgdfBVs+A6xk5H4WMjLthGvx+LM2MCVUdoB9GwzL0KqZNMILigkVVq67AY8nPB4E7V3ZHMTnNiqoAB7aRiLvSS69Qwe8+zIAfDpPzQmUMuSdY1MDarqvT4kIgJlZn3xn9RZUqIEfjaPHWxhOutM2OyuHgMtoM3ewlbNS4Fa4OwDaiLZ3xql6mRjHVlHOKVLwvhTWUtig37r84zzXol72GA1+NriWf3gmbn8hX7Vs0R/gZcsY',
        'success'  => true
    );

    // Yanıtı oluşturup ekrana yazdırıyoruz
    echo "İstek başarılı!\nYanıt: " . json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>POST İsteği Yanıtı</title>
</head>
<body>
    <h1>POST İsteği Testi</h1>
    <p>Butona tıkladığınızda POST isteği gönderilir ve yanıt görüntülenir.</p>
    <form action="" method="POST">
        <button type="submit">POST Gönder</button>
    </form>
</body>
</html>

