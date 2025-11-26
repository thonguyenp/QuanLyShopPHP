<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->message;
        $apiKey = env('GEMINI_API_KEY');

        // Lấy danh sách sản phẩm hiện có từ DB
        $products = Product::with('manufacturer')
            ->get()
            ->map(function($p){
                // Gom các thông số kỹ thuật
                $specs = [];
                if($p->cpu) $specs[] = "CPU: {$p->cpu}";
                if($p->gpu) $specs[] = "GPU: {$p->gpu}";
                if($p->ram) $specs[] = "RAM: {$p->ram}";
                if($p->rom) $specs[] = "ROM: {$p->rom}";
                if($p->connection_port) $specs[] = "Cổng kết nối: {$p->connection_port}";
                if($p->camera) $specs[] = "Camera: {$p->camera}";
                if($p->battery) $specs[] = "Pin: {$p->battery}";
                if($p->monitor_size) $specs[] = "Màn hình: {$p->monitor_size}";
                if($p->monitor_resolution) $specs[] = "Độ phân giải: {$p->monitor_resolution}";

                $specsString = implode(", ", $specs);
                $manufacturer = $p->manufacturer?->name ?? "N/A";

                return "- {$p->name} ({$manufacturer}), Giá: {$p->price}, Specs: {$specsString}, Tồn kho: {$p->stock}, Trạng thái: {$p->status}, Link ảnh: {$p->image_url}";
            })
            ->implode("\n");

        // Prompt định hướng bot chỉ trả lời về sản phẩm điện tử
        $systemPrompt = "Bạn là trợ lý khách hàng trên website bán đồ điện tử (iPad, Laptop, Apple Watch...). 
Chỉ trả lời các câu hỏi liên quan đến sản phẩm. 
Dữ liệu sản phẩm hiện có:\n$products
Nếu câu hỏi ngoài phạm vi sản phẩm, trả lời: 'Xin lỗi, tôi chỉ trả lời về sản phẩm.'";

        // Gọi API Gemini
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-pro:generateContent?key=$apiKey",
            [
                "contents" => [
                    [
                        "parts" => [
                            ["text" => $systemPrompt],
                            ["text" => $message]
                        ]
                    ]
                ]
            ]
        );

        if ($response->failed()) {
            return response()->json(['reply' => 'Hệ thống quá tải, vui lòng thử lại.']);
        }

        $data = $response->json();

        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi.';

        return response()->json(['reply' => $reply]);
    }
}
