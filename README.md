# Struktur dan Implementasi Repository & Use Case Pattern di Laravel

Dokumen ini menjelaskan bagaimana mengimplementasikan Repository dan Use Case Pattern dalam Laravel dengan Model Data Object (MDO) dan Data Transfer Object (DTO).

## 1. Struktur Folder

Berikut adalah struktur folder yang digunakan:

## 2. Implementasi

### 2.1 Data Transfer Object (DTO)

Buat folder `DTOs` untuk menyimpan format request dan response. DTO digunakan untuk memastikan data yang masuk dan keluar memiliki format yang konsisten.

### 2.2 Repository Pattern

- Buat folder `Repositories` yang berisi interface dan implementasi repository.
- Interface mendefinisikan method query ke database.
- Implementasi repository menghubungkan interface dengan database menggunakan Eloquent.
- Daftarkan repository di `AppServiceProvider.php` agar bisa digunakan dengan dependency injection.

### 2.3 Use Case

- Buat folder `UseCases` untuk mengelompokkan business logic.
- Setiap use case dapat:
    - Memanggil lebih dari satu repository.
    - Menggabungkan data dari beberapa repository.
    - Memformat hasil menggunakan DTO sebelum dikembalikan ke controller.

### 2.4 Validasi Request

- Gunakan command Laravel untuk membuat request validation (extends ganti ke CustomFormRequest.php -> cek repository):
    ```sh
    php artisan make:request NamaRequest
    ```

### 2.5 Controller

- (Jika ada request) maka hanya perlu panggil step 2.4 sebelumnya
- Controller hanya bisa panggil usecase dan return hasilnya saja (tidak banyak logic).
