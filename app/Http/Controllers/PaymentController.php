<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\setting ;
use App\Models\User ;
use App\Models\pay ;

class PaymentController extends Controller
{
// إنشاء عملية الدفع وإعادة التوجيه إلى PayPal
protected $setting ;
public function __construct(){
    $this->setting = setting::find(1) ;
}
public function payment(Request $request)
{
    
    $provider = new PayPalClient;

    // إعداد بيانات PayPal من ملف config/paypal.php
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    // إنشاء الطلب

    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD", // يمكنك تغيير العملة إلى ما يناسبك
                    "value" => 100 // قيمة المبلغ المراد دفعه
                ]
            ]
        ],
        "application_context" => [
            "return_url" => route('payment.success',["user_id" => $request->user_id]),
            "cancel_url" => route('payment.cancel'),
        ]
    ]);


    // إذا تم إنشاء الطلب بنجاح، قم بإعادة توجيه المستخدم إلى صفحة الدفع في PayPal
    if (isset($response['id'])) {
        foreach ($response['links'] as $link) {
            if ($link['rel'] === 'approve') {
                // إعادة التوجيه إلى صفحة PayPal للموافقة على الدفع
                return redirect()->away($link['href']);
            }
        }
    }

    return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء عملية الدفع.');
}

// إذا ألغى المستخدم الدفع في PayPal
public function cancel()
{
   
    return redirect()->route('error')->with('error', 'لقد قمت بإلغاء عملية الدفع.');
}

// إذا تمت عملية الدفع بنجاح
public function success(Request $request)
{
    
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    // استرجاع معلومات الدفع بناءً على الـ token الذي يأتي من PayPal بعد الموافقة على الدفع
    $response = $provider->capturePaymentOrder($request->token);
    dd($response);
    // التحقق من نجاح عملية الدفع
    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        pay::create([
            'user_id' => $request->user_id,
            'pay' => $this->setting->amout,
            'time' =>now() ,
        ]);
        User::find($request->user_id)->update([
            "pay" =>now() ,
        ]);
        return redirect()->route('home')->with('success', 'تمت عملية الدفع بنجاح.');
    }
    dd("sucses");
    return redirect()->route('payment.cancel')->with('error', 'فشلت عملية الدفع.');
}
}
