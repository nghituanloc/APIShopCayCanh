<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::all();
        return response()->json(data: $donhangs);
    }

    public function store(Request $request)
    {
        $dh = DonHang::create($request->all());
        return response()->json($dh, 201);
    }

    public function show($tendangnhapkh)
    {
        try {
            // Tìm tất cả đơn hàng theo TENDANGNHAPKH và nạp sẵn quan hệ chitietdhs.sanpham
            $dhs = DonHang::where('TENDANGNHAPKH', $tendangnhapkh)
                ->with(['chitietdhs.sanpham'])
                ->get();

            if ($dhs->isEmpty()) {
                return response()->json(['message' => 'Không tìm thấy đơn hàng nào cho khách hàng này'], 404);
            }

            $data = $dhs->map(function ($dh) {
                return [
                    'MADH'          => $dh->MADH,
                    'TENDANGNHAPKH' => $dh->TENDANGNHAPKH,
                    'NGAYDAT'       => $dh->NGAYDAT,
                    'DIACHIGIAOHANG' => $dh->DIACHIGIAOHANG,
                    'TONGTIEN'      => $dh->TONGTIEN,
                    'CHITIETDH'   => $dh->chitietdhs->map(function ($chitietdh) {
                        return [
                            'MASP'      => $chitietdh->sanpham->MASP,
                            'TENSP'     => $chitietdh->sanpham->TENSP,
                            'HINHANHSP' => $chitietdh->sanpham->HINHANHSP,
                            'GIASP'     => $chitietdh->sanpham->GIASP,
                            'SOLUONGMUA'   => $chitietdh->SOLUONGMUA,
                        ];
                    }),
                ];
            });

            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi lấy thông tin đơn hàng', 'error' => $e->getMessage()], 500);
        }
    }
    public function showById($madh) // Thêm hàm showById
    {
        try {
            // Tìm đơn hàng theo MADH và nạp sẵn quan hệ chitietdhs.sanpham
            $dh = DonHang::where('MADH', $madh)
                ->with(['chitietdhs.sanpham'])
                ->first();

            if (!$dh) {
                return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
            }

            $data = [
                'MADH'          => $dh->MADH,
                'HOTENKH'       => $dh->khachhang->HOTENKH,
                'NGAYDAT'       => $dh->NGAYDAT,
                'DIACHIGIAOHANG' => $dh->DIACHIGIAOHANG,
                'TONGTIEN'      => $dh->TONGTIEN,
            ];

            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi lấy thông tin đơn hàng', 'error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $dh = DonHang::find($id);
            if (!$dh) {
                return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
            }
    
            // Xóa các chi tiết đơn hàng liên quan
            $dh->chitietdhs()->delete();
    
            // Sau đó mới xóa đơn hàng
            $dh->delete();
    
            return response()->json(['message' => 'Xóa đơn hàng thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi xóa đơn hàng', 'error' => $e->getMessage()], 500);
        }
    }
     public function baoCao(Request $request)
    {
        try {
            $startDate = $request->input('startDate');
            $endDate = $request->input('endDate');
            $filterType = $request->input('filterType', 'day'); // Mặc định là 'day'

            // Validate ngày
            if (!$startDate || !$endDate) {
                return response()->json(['message' => 'Thiếu ngày bắt đầu hoặc ngày kết thúc'], 400);
            }

            $start = Carbon::parse($startDate)->startOfDay();
            $end = Carbon::parse($endDate)->endOfDay();

            if ($start > $end) {
                return response()->json(['message' => 'Ngày bắt đầu không được lớn hơn ngày kết thúc'], 400);
            }

            // Lấy dữ liệu đơn hàng trong khoảng thời gian
            $donHangs = DonHang::with(['chitietdhs.sanpham'])
                ->whereBetween('NGAYDAT', [$start, $end])
                ->get();

            // Tổng hợp dữ liệu
            $aggregatedData = [];
            foreach ($donHangs as $dh) {
                foreach ($dh->chitietdhs as $ctdh) {
                    $orderDate = Carbon::parse($dh->NGAYDAT);
                    $key = '';

                    if ($filterType === 'day') {
                        $key = $orderDate->format('Y-m-d');
                    } elseif ($filterType === 'week') {
                        $key = $orderDate->startOfWeek()->format('Y-m-d'); // Thứ 2 đầu tuần
                    } elseif ($filterType === 'month') {
                        $key = $orderDate->format('Y-m');
                    }

                    if (!isset($aggregatedData[$key])) {
                        $aggregatedData[$key] = [];
                    }

                    if (!isset($aggregatedData[$key][$ctdh->MASP])) {
                        $aggregatedData[$key][$ctdh->MASP] = [
                            'MASP' => $ctdh->MASP,
                            'TENSP' => $ctdh->sanpham->TENSP,
                            'quantity' => 0,
                            'total' => 0,
                        ];
                    }

                    $aggregatedData[$key][$ctdh->MASP]['quantity'] += $ctdh->SOLUONGMUA;
                    $aggregatedData[$key][$ctdh->MASP]['total'] += $ctdh->SOLUONGMUA * $ctdh->sanpham->GIASP;
                }
            }

            // Chuyển đổi dữ liệu thành mảng để trả về
            $report = [];
            foreach ($aggregatedData as $date => $products) {
                foreach ($products as $product) {
                    $report[] = [
                        'date' => $date,
                        'MASP' => $product['MASP'],
                        'TENSP' => $product['TENSP'],
                        'quantity' => $product['quantity'],
                        'total' => $product['total'],
                    ];
                }
            }

            return response()->json($report, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi lấy dữ liệu báo cáo', 'error' => $e->getMessage()], 500);
        }
    }
}

