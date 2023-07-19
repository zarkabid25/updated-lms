<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Models\cart;
use App\Models\PurchaseCourse;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Exception;
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        //dd($request->all());

        $data = [
          'payment_amount'  => $request->payment_plan,
          'payment_method' => $request->payment_method
        ];

        return view('user/payment', $data);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stripePost(Request $request)
    {
        $payment_amount = str_replace('$', '', $request->amount);
        $payment_method = $request->payment_method;
        $admin = User::find(1);

        Stripe\Stripe::setApiKey($admin->stripe_secret_key);

        $pay =Stripe\Charge::create ([
                "amount" => $payment_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment successfully"
        ]);

        if($pay->description == 'Payment successfully'){

            if($payment_amount == '10'){
                $data = [
                    'user_id' => auth()->user()->id,
                    'payment_amount' => $payment_amount,
                    'payment_method' => $payment_method,
                    'subscription_type' => 'basic'
                ];
            }else{
                $data = [
                    'user_id' => auth()->user()->id,
                    'payment_amount' => $payment_amount,
                    'payment_method' => $payment_method,
                    'subscription_type' => 'enterprise'
                ];
            }

            $start = date('Y-m-d');
            $exp = date('Y-m-d', strtotime($start. ' + 30 days'));

            if($payment_amount == '10'){
                $vids = (new User())->checkVids();
                $vids_left = $vids->remaining_vids + 50;

                $sub_exp = [
                    'subscription_expiry_date' => $exp,
                    'remaining_vids' => $vids_left,
                ];
            }else{
                $sub_exp = [
                    'subscription_expiry_date' => $exp,
                ];
            }
            $res = (new User())->storeExpiry($sub_exp);
            if($res == '1'){
                $result = (new Subscription())->storeSubscription($data);
                if(!empty($result)){
                    return redirect()->route('teacher.dashboard')->with('success', 'Payment successful.');
                }
            }
        }
    }
    public function studentstripe(Request $request)
    {
       //dd($request->all());
        //$teacher_id = User::find($request->teacher_id);
        $teacher = User::find(1);

        $data = [
          'payment_amount'  => $request->amount,
          'teacher'=>$teacher,
          'cart_id'=>$request->cart_id,
          'payment_method' => $request->payment_method,
          'class_id' => $request->class_id,
          'teacher_id' => $request->teacher_id,
        ];

        return view('student/payment', $data);
    }
    public function stripestudentPost(Request $request)
    {
        //dd($request->all());
        try{
            $payment_amount = str_replace('$', '', $request->amount);
            $teacher = User::find(1);

            Stripe\Stripe::setApiKey($teacher->stripe_secret_key);

            $pay =Stripe\Charge::create ([
                    "amount" => $payment_amount * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment successfully"
            ]);

            if($pay->description == 'Payment successfully'){
                $data = [
                  'user_id' => auth()->user()->id,
                  't_amount' => $payment_amount
                ];

                (new Transaction())->transaction($data);
                (new User())->balance($request->teacher_id, $payment_amount);

                $cart = cart::where('user_id', auth()->user()->id)->whereHas('course')->get();

                foreach ($cart as $key => $value) {
                    $purchase = new PurchaseCourse();
                    $purchase->user_id = auth()->user()->id;
                    $purchase->course_id = $value->course_id;
                    $purchase->teacher_id =$value->course->teacher_id;
                    $purchase->class_id = $value->course->create_class_id;
                    $purchase->save();

                    $course_price=$value->course->price;

                    $user=User::find($value->course->teacher_id);
                    $current_earning=$user->coin;
                    $new=$current_earning+$course_price;

                    $user->coin=$new;
                    $user->update();
                    
                auth()->user()->givePermissionTo('Course'.$value->course_id);
                    //$value->delete();
                }
                cart::where('user_id', auth()->user()->id)->delete();


            return redirect()->route('student.dashboard')->with('success',"Payment has submitted successfully");
        } else{
        $teacher = User::find(1);

        $data = [
        'teacher'=>$teacher,
          'payment_amount'  => $request->amount,
          'payment_method' =>"visa"
        ];

        return view('student/payment', $data);
        //return back()->with('error',"Transaction Failed");
       }
    }catch(exception $e){
        $teacher = User::find(1);

        $data = [
        'teacher'=>$teacher,
          'payment_amount'  => $request->amount,
          'payment_method' =>"visa"
        ];

        return view('student/payment', $data);
        //return back()->with('error',$e->getMessage());
    }
    }
}
