<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PaymentPlan;
use App\Models\PermissionUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\User;
use App\Models\cart;
use App\Models\PurchaseCourse;

use Session;

class PaymentController extends Controller
{

    public function paymentPlan(Request $request){
       // dd($request->all());

        try {
            if($request->has('course_id')){
                $data = [
                    'user_id' =>$request->user_id,
                    'teacher_id' => $request->teacher_id,
                    'course_id' => $request->course_id,
                    'price' => $request->course_price,
                    'request_product' => $request->request_product,
                    'status' => 'pending',
                ];
            } else{
                $data = [
                    'user_id' => auth()->user()->id,
                    'payment_plan' => $request->payment_plan,
                    'price' => $request->price,
                    'request_product' => $request->request_product,
                    'status' => 'pending',
                ];
            }

//            if(!empty($res)){
                if($request->has('course_id')){
                    $notif = notification(auth()->user()->id, 'Course payment request', 'Payment request for course', 'student', $request->course_id);

                    $data['notification_id'] = $notif->id;
                    $res = (new PaymentPlan())->storePlan($data);

                    $details = [
                        'title'  => 'Course Payment Request',
                        'body'  => 'You have requested to buy '.ucfirst($request->course_name).' course. We will get back to you soon.',
                    ];
                    Mail::to(auth()->user()->email)->send(new \App\Mail\McqsBuyRequest($details));
                    return redirect()->back()->with('success', 'Request submitted successfully.');
                } else{
                    $notif = notification(auth()->user()->id, 'MCQs payment request', 'Payment request for MCQs', 'student', '0');

                    $data['notification_id'] = $notif->id;
                    $res = (new PaymentPlan())->storePlan($data);

                    $details = [
                        'title'  => 'MCQs Payment Request',
                        'body'  => 'You have requested to buy '.ucfirst($request->payment_plan).' plan for Mcqs. We will get back to you soon.',
                    ];
                    Mail::to(auth()->user()->email)->send(new \App\Mail\McqsBuyRequest($details));
                    return redirect()->route('user-payment-methods', ['data' => encrypt('true')])->with('success', 'Request submitted successfully.');
                }
//            } else{
//                return redirect()->back()->with('error', 'Something went wrong');
//            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function paymentRequests(){
        $notifications = (new Notification())
            ->where('role', '!=', 'admin')
            ->with('user', 'paymPlan')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.requests.requests', compact('notifications'));
    }

    public function requestDetail(Request $request, $id){
        $notif_id = decrypt($id);
        if($request->has('notif')){
            (new Notification())->with('user')->where('id', $notif_id)
                ->update([
                   'status' => '1'
                ]);
        }
        $notification = (new Notification())->with('user', 'paymPlan')->where('id', $notif_id)->first();
//        $paymPlan = (new PaymentPlan())->where('user_id', $notification->user_id)->first(['id', 'status', 'request_product']);

        return view('admin.requests.request-detail', compact('notification'));
    }

    public function updateUequestStatus($id, $request_product){
        try{
            $paym_plan_id = decrypt($id);
            $product = decrypt($request_product);
            $paym = (new PaymentPlan())->where('id', $paym_plan_id)->first(['user_id', 'notification_id', 'teacher_id', 'course_id']);
            $email = (new User())->where('id', $paym->user_id)->first()->email;
            $data = [
                'permission_id' => $product,
                'model_type' => 'App\Models\User',
                'model_id' => $paym->user_id,
            ];

            $res = (new PaymentPlan())->where('id', $paym_plan_id)
                ->update([
                    'status' => 'approved',
                ]);

            (new Notification())->where('id', $paym->notification_id)
                ->update([
                    'status' => '1',
                ]);

            $rec = (new PermissionUpdate())->givePermission($data);

            if($res == 1){
                if($product == 2){
                    notification($paym->user_id, 'Course payment request', 'Congratulations! Your request against purchase course has been approved.', 'admin', $paym->course_id);

                    notification($paym->teacher_id, 'Course Purchased', 'Congratulations! A student has purchased your course.', 'admin', $paym->course_id);

                    $details = [
                        'title'  => 'Course Payment Request',
                        'body'  => 'Your request to buy course has been approved. Now you can watch course videos.',
                    ];
                    Mail::to($email)->send(new \App\Mail\McqsBuyRequest($details));
                } else{
                    notification($paym->user_id, 'MCQs payment request', 'Congratulations! Your request against purchase mcqs has been approved.', 'admin', '0');

                    $details = [
                        'title'  => 'MCQs Payment Request',
                        'body'  => 'Your request to buy Mcqs bank has been approved. Now you can get complete access of MCQs',
                    ];
                    Mail::to($email)->send(new \App\Mail\McqsBuyRequest($details));
                }

                return redirect()->route('admin.payment-requests')->with('success', 'Payment status updated successfully');
//                return redirect()->back()->with('success', 'Payment status updated successfully');
            } else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function userUpdateNotification($notif_id, $p_id){
        $notif = decrypt($notif_id);
        $p_id = decrypt($p_id);

        $rec = (new Notification())->where('id', $notif)->first(['user_id', 'title']);
        (new Notification())->where('id', $notif)->update([
           'status' => '1'
        ]);

        if($p_id != '0'){
            return redirect()->route('student.course-detail', ['id' => encrypt($p_id)]);
        } else{
            return redirect()->route('student.categories');
        }
    }

//    private $gateway;
//
//    public function __construct()
//    {
//        $this->gateway = Omnipay::create('PayPal_Rest');
//        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID','AUVgR-fGmGuOqfOjZIsKhm65sUD6UDbbg6ag-9igPtw5_2rM1UCz82xw5dOgawM3zGOMNE1nN95L4uSv'));
//        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET','EOFcpLGqhMDIWHjKmO6Xv6f-uSjSOQRx9P7XwElW-6Mp6bi6O2Kx5XqR9nSzXpGVSPIy1KH4oyi5MWRI'));
//        $this->gateway->setTestMode(true); //set it to 'false' when go live
//    }
//
//    /**
//     * Call a view.
//     */
//    public function index()
//    {
//        return view('payment');
//    }
//
//    /**
//     * Initiate a payment on PayPal.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     */
//    public function charge(Request $request)
//    {
//        ///dd('d');
//        if($request->input('submit'))
//        {
//            Session::put('amount',$request->amount);
//
//            Session::put('payment',"tech");
//
//            try {
//                $response = $this->gateway->purchase(array(
//                    'amount' => $request->input('amount'),
//                    'currency' => env('PAYPAL_CURRENCY','USD'),
//                    'returnUrl' => url('success'),
//                    'cancelUrl' => url('error'),
//                ))->send();
//
//                if ($response->isRedirect()) {
//                    $response->redirect(); // this will automatically forward the customer
//                } else {
//                    // not successful
//                    return $response->getMessage();
//                }
//            } catch(Exception $e) {
//                return $e->getMessage();
//            }
//        }
//    }
//    public function stdcharge(Request $request)
//    {
//        ///dd('d');
//        if($request->input('submit'))
//        {
//
//            Session::put('amount',$request->amount);
//            Session::put('payment',"std");
//
//            try {
//
//                $response = $this->gateway->purchase(array(
//                    'amount' => $request->input('amount'),
//                    'currency' => env('PAYPAL_CURRENCY','USD'),
//                    'returnUrl' => url('success'),
//                    'cancelUrl' => url('error'),
//                ))->send();
//
//                if ($response->isRedirect()) {
//                    $response->redirect(); // this will automatically forward the customer
//                } else {
//                    // not successful
//                    return $response->getMessage();
//                }
//            } catch(Exception $e) {
//                return $e->getMessage();
//            }
//        }
//    }
//
//
//    /**
//     * Charge a payment and store the transaction.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     */
//    public function success(Request $request)
//    {
//        // Once the transaction has been approved, we need to complete it.
//        if ($request->input('paymentId') && $request->input('PayerID'))
//        {
//            $transaction = $this->gateway->completePurchase(array(
//                'payer_id'             => $request->input('PayerID'),
//                'transactionReference' => $request->input('paymentId'),
//            ));
//            $response = $transaction->send();
//
//            if ($response->isSuccessful())
//            {
//                // The customer has successfully paid.
//                $arr_body = $response->getData();
//                $payment_amount=Session::get('amount');
//                $payment_method="Paypal";
//                $check_payment=Session::get('payment');
//                //dd($check_payment);
//
//                // Insert transaction data into the database
//
//                if($check_payment == 'std'){
//
//
//
//
//
//
//
//                }
//                else{
//                    if($payment_amount == '10'){
//                    $data = [
//                        'user_id' => auth()->user()->id,
//                        'payment_amount' => $payment_amount,
//                        'payment_method' => $payment_method,
//                        'subscription_type' => 'basic'
//                    ];
//                    }else{
//                        $data = [
//                            'user_id' => auth()->user()->id,
//                            'payment_amount' => $payment_amount,
//                            'payment_method' => $payment_method,
//                            'subscription_type' => 'enterprise'
//                        ];
//                    }
//
//                    $start = date('Y-m-d');
//                    $exp = date('Y-m-d', strtotime($start. ' + 30 days'));
//
//                    if($payment_amount == '10'){
//                        $vids = (new User())->checkVids();
//                        $vids_left = $vids->remaining_vids + 50;
//
//                        $sub_exp = [
//                            'subscription_expiry_date' => $exp,
//                            'remaining_vids' => $vids_left,
//                        ];
//                    }else{
//                        $sub_exp = [
//                            'subscription_expiry_date' => $exp,
//                        ];
//                    }
//                    $res = (new User())->storeExpiry($sub_exp);
//                    if($res == '1'){
//                        $result = (new Subscription())->storeSubscription($data);
//                        if(!empty($result)){
//                            return redirect()->route('teacher.dashboard')->with('success', 'Payment successful.');
//                        }
//                    }
//                }
//
//                    // return "Payment is successful. Your transaction id is: ". $arr_body['id'];
//                } else {
//                    return $response->getMessage();
//                }
//        } else {
//            return 'Transaction is declined';
//        }
//    }
//
//    /**
//     * Error Handling.
//     */
//    public function error()
//    {
//        return 'User cancelled the payment.';
//    }
//    public function success2()
//    {
//
//                    $cart=cart::where('user_id',\Auth::user()->id)->get();
//                    foreach ($cart as $key => $value) {
//                        $purchase=new PurchaseCourse();
//                        $purchase->user_id = \Auth::user()->id;
//                        $purchase->course_id = $value->course_id;
//                        $purchase->teacher_id = $value->course->teacher_id;
//                        $purchase->class_id = $value->course->create_class_id;
//                        $purchase->save();
//
//                        $course_price=$value->course->price;
//
//                        $user=User::find($value->course->teacher_id);
//                        $current_earning=$user->coin;
//                        $new=$current_earning+$course_price;
//
//                        $user->coin=$new;
//                        $user->update();
//
//
//                        $carty=cart::find($value->id);
//                        $carty->delete();
//
//
//                    }
//                    return redirect()->route('student.dashboard')->with('success', 'Payment successful.');
//    }
}
