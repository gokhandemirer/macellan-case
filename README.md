## Kurulum

Projeyi local ortamınıza çektikten sonra proje dizini içerisindeki aşağıdaki komutları çalıştırmanız yeterlidir;

<code>composer install && php artisan migrate --seed && docker-compose up --build -d</code>

Proje 8080 portunda ayağa kalkacaktır, veritabanı ise 5434 portunda ayağa kalkacaktır. Aşağıdaki cURL kodu ile istek atabilirsiniz.

<code>
curl --location --request POST 'http://localhost:8080/api/open-gate' \
--header 'Content-Type: application/json' \
--data-raw '{
    "point": "0.00",
    "order_id": "3307333742",
    "user_id": "3b43544b-10b4-45e2-ab81-2b2b3f1917e8",
    "ref_code": "0781534070",
    "hash": "2918f946ce80bd37e7dbf4ade4888df9d281de0d"
}'
</code>
