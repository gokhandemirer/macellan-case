## Kurulum

Projeyi local ortamınıza çektikten sonra projenin ana dizininde .env dosyasını oluşturup veritabanı ayarlarını yapmalısınız. 
Daha sonra proje dizini içerisindeyken aşağıdaki komutları sırasıyla çalıştırmalısınız.

<code>composer install && docker-compose up --build -d</code>

Bu komutu çalıştırdığınzda proje 8080 portunda, veritabanı ise 5434 portunda ayağa kalkacaktır. Veritabanınız ayağa kalktıktan sonra veritabanınızı oluşturup .env dosyası içerisinde gerekli ayarları
yapabilirsiniz. Gereken ayarlar yapıldıktan sonra aşağıdaki komutu çalıştırabilirsiniz;

<code>php artisan migrate</code>

Bu komutla birlikte gerekli tablolar oluşturduğunuz veritabanı içerisinde oluşturulmuş olacaktır.

Aşağıdaki cURL kodu ile istek atabilirsiniz.

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
