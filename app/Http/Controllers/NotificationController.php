<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Midtrans\Transaction;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function post(Request $req)
    {
        try {
            $notification_body = json_decode($req->getContent(), true);
            $invoice = $notification_body['order_id'];
            $transaction_id = $notification_body['transaction_id'];
            $status_code = $notification_body['status_code'];
            // $order = Order::where('invoice', $invoice)->where('transaction_id', $transaction_id)->first();
            //             if (!$order)
            //                 return ['code' => 0, 'message' => 'Terjadi kesalahan | Pembayaran tidak valid'];
            // switch ($status_code) {
            //                 case '200':
            //                     $order->status = "SUCCESS";
            //                     break;
            //                 case '201':
            //                     $order->status = "PENDING";
            //                     break;
            //                 case '202':
            //                     $order->status = "CANCEL";
            //                     break;
            //             }
            // $order->save();
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
