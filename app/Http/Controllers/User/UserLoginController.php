<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\PasswordAccount;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyAccount;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        if (Auth::guard('account')->attempt($arr)) {
            $accout_id = Auth::guard('account')->id();
            // dd(Auth::guard('account')->id());
            $account = Account::find($accout_id);
            // dd('đăng nhập thành công');
            // dd(Auth::guard('account')->user()->name);
            return redirect()->route('user.index')->with('status', 'succsec');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {


            return redirect()->route('user.login')->with('dangerous', 'Tài khoản hoặc mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }
    public function create()
    {

        return view('user.login.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'signupName' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại trong hệ thống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
            ],
            [
                'signupName' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]
        );
        if ($validate) {
            $data = [
                'name' => $request->signupName,
                'email' => $request->email,
                'password' => $request->password,
            ];
            Account::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'verify_account' => false,
            ]);
            return redirect()->route('user.login')->with('status', 'Tạo tài khoản thành công');
        } else {
            return redirect()->route('user.register')->with('dangerous', 'Tạo tài khoản thất bại');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('account')->logout();
        
        //  $request->session()->invalidate();

        // $request->session()->regenerateToken();
        return redirect()->route('user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function verify()
    {

        return view('user.login.verify');
    }
    public function sendMail(Request $request, $id)
    {

        $user = Account::where('id', $id)->firstOrFail();
        // $verify =  [
        //     'email' => $user->email,
        //     'token' =>  rand(1000,5000),
        // ];
        $passwordReset = PasswordAccount::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => rand(1000, 5000),
        ]);
        if ($passwordReset) {
            $user->notify(new VerifyAccount($passwordReset->token));
        }
        $status = 'Chúng tôi đã gửi mã code vào email của bạn .';
        return view('user.login.verifyConfirm', compact('status'));
    }
    public function verifyConfirm(Request $request, $id)
    {
        // $passwordReset = PasswordAccount::where('token', $request->token)->firstOrFail();
        $user = Account::where('id', $id)->firstOrFail();
        $email =  PasswordAccount::where('email', $user->email)->firstOrFail();
        if (Carbon::parse($email->updated_at)->addMinutes(720)->isPast()) {
            $email->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        if ($request->code) {
            if ($request->code == $email->token) {
                $user->verify_account = true;
                $user->update();
                $email->delete();

                return redirect()->route('user.verify')->with('status', 'Xác thực thành công .');
            } else {
                $status = 'Mã không đúng xin nhập lại .';
                return view('user.login.verifyConfirm', compact('status'));
            }
        }
        // $user = Account::where('email', $passwordReset->email)->firstOrFail();
        // $updatePasswordUser = $user->update(['password'=> Hash::make($request->password)]);
        // $passwordReset->delete();
        // return redirect()->route('user.login')->with('status','Bạn đã đổi mật khẩu thành công');
    }
    function infoAccount()
    {
        return view('user.login.info');
    }
    function accountOrder()
    {
        $account_id = Auth::guard('account')->user()->id;
        $orderId = Order::select('id')->where('account_id', $account_id)->get();
        $arr_order_ids = array();
        if (count($orderId) > 0) {
            foreach ($orderId as $id) {
                array_push($arr_order_ids, $id->id);
            }
        }
        $selectStatus = ['Đang xử lý', 'Đang giao hàng', 'Hoàn thành'];
        $orderDetails = DB::table('products')->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->join('product_colors', 'product_colors.product_id', '=', 'products.id')
            ->select('product_colors.image_color_path', 'products.name', 'order_details.color', 'products.price', 'order_details.quantity', 'order_details.order_id', 'order_details.updated_at')
            ->whereIn('order_details.order_id', $arr_order_ids)
            ->where('product_colors.color_id', function ($query) {
                $query->select('colors.id')
                    ->from('colors')
                    ->whereRaw('order_details.color = colors.name');
            })->get();
        $orderDetails->transform(function ($item) {
            $item->status = $this->getOrderStatusById($item->order_id);
            return $item;
        });
        return view('user.components.accountOrder', compact('orderDetails', 'selectStatus'));
    }

    public function infoAddress()
    {
        $account_id = Auth::guard('account')->user()->id;
        $account = Account::find($account_id);
        // dd($account);
        return view('user.components.accountAddress', compact('account'));
    }
    public function postInfoAddress(Request $request)
    {
        $account_id = Auth::guard('account')->user()->id;
        $account = Account::find($account_id);
        if ($request->FullName !== null) {
            $account->name = $request->FullName;
        }
        if ($request->Phone !== null) {
            $account->phone_number = $request->Phone;
        }
        if ($request->calc_shipping_district !== null) {
            $account->district = $request->calc_shipping_district;
        }
        if ($request->calc_shipping_provinces !== null) {
            $account->provinces = $request->calc_shipping_provinces;
        }
        if ($request->Address !== null) {
            $account->address = $request->Address;
        }
        if ($request->Address !== null && $request->calc_shipping_district !== null && $request->calc_shipping_provinces !== null) {
            $address = $request->Address . ', ' . $request->calc_shipping_district . ', ' . $request->calc_shipping_provinces;
            $account->full_address = $address;
        }
        $account->save();
        return redirect()->back();
    }
    public function getChangePassword()
    {
        return view('user.components.accountChangePass');
    }
    public function postChangePassword(Request $request)
    {
        if (Hash::check($request->OldPassword, Auth::guard('account')->user()->password)) {
            if ($request->Password === $request->ConfirmPassword) {
                $account = Account::find( Auth::guard('account')->id());
                $account->password = Hash::make($request->Password);
                $account->save();
                $status = 'Đổi mật khẩu thành công';
            }else{
                $errors = 'Xác nhận mật khẩu không khớp';
                return redirect()->back()->with('errors', $errors);
            }
        } else {
            $errors = 'Mật khẩu hiện tại không đúng';
            return redirect()->back()->with('errors', $errors);
        }
    
        return redirect()->route('user.changepass')->with('status', $status);
    }
    public function destroy($id)
    {
        //
    }
    public function getOrderStatusById($id)
    {
        $status = Order::where('id', $id)->pluck('status');
        return $status[0];
    }
}
