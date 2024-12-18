1Cài đặt các gói phụ thuộc: Trong thư mục dự án Laravel, chạy lệnh sau để cài đặt các gói:    

composer install



##Chỉnh sửa file .env để kết nôi csdl 
DB_CONNECTION=mysql  --Tên hệ quản trị
DB_HOST=127.0.0.1    --IP
DB_PORT=3306         -- Cổng
DB_DATABASE=laravel  --Tên CSDL
DB_USERNAME=root
DB_PASSWORD=


2. Chạy migrations để tạo csdl

   php artisan migrate

DATA mẫu import:

	php artisan db:seed


3. khởi động server bằng lệnh:
   php artisan serve







