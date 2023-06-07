<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Midtrans\Transaction;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class NotificationController extends Controller
{
    //
    public function post(Request $req)
    {
        try {
            $notification_body = json_decode($req->getContent(), true);
            $invoice = $notification_body['order_id'];
            $transaction_status = $notification_body['transaction_status'];
            // $transaction_id = $notification_body['transaction_id'];
            // $status_code = $notification_body['status_code'];
            // ['pending', 'paid', 'failed', 'expired']
            $order = Order::where('id', $invoice)->first();
            if (!$order)
                return ['code' => 0, 'message' => 'Terjadi kesalahan | Pembayaran tidak valid'];
            switch ($transaction_status) {
                case 'settlement':
                    $order->status = "paid";
                    $product = Product::where('id', $order->product_id)->first();
                    $product->product_stock = $product->product_stock - $order->quantity;
                    $product->save();
                    break;
                case 'pending':
                    $order->status = "pending";
                    break;
                case 'expire':
                    $order->status = "expired";
                    break;
                case 'failure':
                    $order->status = "failed";
                    break;
            }
            $order->save();
            return response('OK', 200)->header('Content-Type', 'text/plain');
            // dd($notification_body);
            // return ['code' => 200, 'data' => $notification_body, 'status' => $status_code, 'invoice' => $invoice];
        } catch (\Exception $e) {
            return response('Error', 404)->header('Content-Type', 'text/plain');
        }
    }

    public function getStatus($id)
    {
        $payload = Transaction::status($id);

        return ['data' => $payload];
    }
}
