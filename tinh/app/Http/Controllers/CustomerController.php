<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->keyword)){
            $customers = Customer::where('name', 'LIKE', '%' . $request->keyword . '%')->paginate(5);
        } else {
            $customers = Customer::paginate(5);

        }
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities'));
    }
    public function create()
    {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->city_id = $request->input('city_id');
        $customer->save();
        Session::flash('success', 'Tạo mới khách hàng thành công');
        return redirect()->route('customers.index');
    }
    public function edit($id)
    {
        //tìm id nếu id ko có thì báo lỗi 400
        $customer = Customer::findOrFail($id);
        //lấy tất cả thông tin của bảng cities
        $cities = City::all();

        return view('customers.edit', compact('customer', 'cities'));
    }
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->city_id = $request->input('city_id');
        $customer->save();
        //dùng để thông báo ở view
        Session::flash('success', 'Cập nhật khách hàng thành công');

        return redirect()->route('customers.index');
    }
    //tiêm vào dependency injection để không cần khởi tạo lại lớp đó nữa
    public function filterByCity(Request $request)
    {

        $cities = City::all();
        $customers = Customer::where('city_id', '=', $request->city_id)->paginate(5);
        return view('customers.list', compact('customers', 'cities'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities'));
    }
}
