## Silabus Pembelajaran Lumen 
Lumen merupakan Micro Framework dari Laravel yang dibuat untuk para developer dalam mengembangkan sebuah aplikasi yang mengakomodasi sebuah Restfull API. Lumen digunakan untuk membuat aplikasi yang skalanya masih kecil.

1. Instalasi lumen php framework dan Generate Key
```bash
composer create-project --prefer-dist laravel/lumen lumen-api
```
2. Lumen Route - membuat URL atau API Endpoint dengan method HTTP
> Routing adalah suatu jalur awal ketika terdapat akses suatu URL dari halaman browser.
Berikut 6 jenis Method HTTP:
- GET
- POST
- DELETE
- PATCH
- PUT
- OPTIONS

3. Lumen Route - Memberikan Parameter Dinamis pada URL
4. Lumen Route - Memberi nama alias pada route
5. Lumen Route - Mengelompokkan Route dengan Method Group
6. Lumen Middleware - Menggunakan Middleware pada Route
> Middleware merupakan penengah atau protection antara request dengan respon, Ex: Middleware Age.
Jadi buat middleware di app/Http/Middlware/Age.php dan daftarkan middlware di bootstrap/app.php.
7. Lumen Controller - Menggunakan Controller pada Route
8. Lumen Controller - Menggunakan Parameter dalam Controller
9. Lumen Controller - Menggunakan name route pada Controller
10. Lumen Controller - Implementasi Middleware pada Controller
11. Lumen Request  - Menggunakan Request Handler pada Controller
12. Lumen Request  - Mengambil Nilai Inputan menggunakan request
13. Lumen Respon - Menampilkan Response dari suatu Request

### Sumber Referensi
- [Lumen PHP Framework](https://lumen.laravel.com/)
- [Embuncode](https://embuncode.blogspot.com/)