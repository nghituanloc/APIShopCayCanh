<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Admin routes
        'admins',
        'admins/*',

        // Đánh Giá routes
        'danh-gia-dh',
        'danh-gia-dh/*',

        // Đơn Hàng routes
        'don-hangs',
        'don-hangs/*',

        // Giỏ Hàng routes
        'gio-hangs',
        'gio-hangs/*',

        // Khách Hàng routes
        'khach-hangs',
        'khach-hangs/*',

        // Phân Loại Sản Phẩm routes
        'phan-loai-sp',
        'phan-loai-sp/*',

        // Sản Phẩm routes
        'san-phams',
        'san-phams/*',

        // Tham Chiếu routes
        'thamchieus',
        'thamchieus/*',

        // Thêm routes
        'thems',
        'thems/*',
    ];
}
