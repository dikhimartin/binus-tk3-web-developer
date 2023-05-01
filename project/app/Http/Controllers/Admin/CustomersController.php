<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Sample;
use App\User;
use App\RoleUser;
use App\Role;
use App\Asset;
use App\Customer;
use App\Province;
use App\Traits\RespondsWithHttpStatus;
use Yajra\DataTables\Facades\DataTables;


class CustomersController extends Controller
{
    use RespondsWithHttpStatus;
    
    private $controller = 'customer';

    private function title(){
        return __('main.customer_list');
    }

    public function __construct() {
        $this->middleware('auth');
    }     

    public function index(){
        if (!Auth::user()->can($this->controller.'-list')){
            return view('backend.errors.401')->with(['url' => '/admin']);
        }
        $roles =  Role::where('roles.id','!=',1)->get();

        $province = Province::get();

        return view('backend.'.$this->controller.'.list', compact('roles','province'))->with(array('controller' => $this->controller, 'pages_title' => $this->title()));
    }

    public function get_data(Request $request){
        if (!Auth::user()->can($this->controller.'-list')){
            return $this->unauthorizedAccessModule();
        }        

        $customer = new Customer;
        $datas = $customer->get_data();

        return DataTables::of($datas)
        ->filter(function ($query) use ($request) {
            $query->when($request->has('search.value'), function ($q) use ($request) {
                $value = $request->input('search.value');
                $q->where(function ($query) use ($value) {
                    $query->where('users.name', 'like', "%$value%")
                        ->orWhere('users.username', 'like', "%$value%")
                        ->orWhere('users.email', 'like', "%$value%")
                        ->orWhere('users.status', 'like', "%$value%");
                        // ->orWhereHas('roles', function ($q) use ($value) {
                        //     $q->where('display_name', 'like', "%{$value}%");
                        // });
                });
            });
            // if (Auth::user()->role_id != 1) {
            //     $query->where('users.role_id', '!=', 1);
            // }
        })
        ->addColumn('action', function ($data) {
            // add your action column logic here
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
    public function validate_data(Request $request, $id = null){
        $rules = [
            'name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'subdistrict_id' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($id)
            ],
            'password_confirmation' => 'sometimes|required_with:password|same:password'
        ];
    
        // add password rule conditionally
        if($request->method() === 'POST') {
            $rules['password'] = 'required|min:6|confirmed';
        } else {
            $rules['password'] = 'nullable|min:6|confirmed';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        return $validator;
    }

    public function create(Request $request){
        if (!Auth::user()->can($this->controller.'-create')){
            return $this->unauthorizedAccessModule();
        }  

        $validator = $this->validate_data($request);
        if ($validator->fails()) {
            return $this->badRequest($validator->errors());
        }
        
        // set image assets
        $avatar = Asset::upload($request->file('avatar'), "users");
        if ($avatar['status'] == 'error') {
            return $this->badRequest($avatar['message']);
        }
        $nid = Asset::upload($request->file('national_identity_document'), "national_identity");
        if ($nid['status'] == 'error') {
            return $this->badRequest($nid['message']);
        }
        
        $data = $request->all();
        if (!empty($avatar['data'])) {
            $data['asset_id'] = $avatar['data']->id;
        }
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        
        $role_user = new RoleUser;
        $role_user->user_id = $user->id;
        $role_user->role_id = 4;
        $role_user->save();

        $customer = new Customer;
        if (!empty($nid['data'])) {
            $customer->national_identity_asset_id = $nid['data']->id;
        }
        $customer->user_id = $user->id;
        $customer->place_of_birth = $request->place_of_birth;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->gender = $request->gender;
        $customer->province_id = $request->province_id;
        $customer->city_id = $request->city_id;
        $customer->subdistrict_id = $request->subdistrict_id;
        $customer->address_line = $request->address_line;
        $customer->save();

        return $this->created($user, null);
    }

    public function update(Request $request, $id){
        if (!Auth::user()->can($this->controller.'-edit')){
            return $this->unauthorizedAccessModule();
        }       
        
        $validator = $this->validate_data($request, $id);
        if ($validator->fails()) {
            return $this->badRequest($validator->errors());
        }        

        $user = User::find($id);
        if($user == null){
            return $this->errorNotFound(null);
        }     

        // set remove image
        if($request->avatar_remove == "0" || $request->avatar_remove == "1"){
            if(!empty($user->asset_id)){
                Asset::remove($user->asset_id);
            }
            $user->asset_id = null;
        }

        // set image assets
        $asset = Asset::upload($request->file('avatar'), "users", $user->asset_id);
        if ($asset['status'] == 'error') {
            return $this->badRequest($asset['message']);
        }
        if (!empty($asset['data'])) {
            $user->asset_id = $asset['data']->id;
        }
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();   

        return $this->ok($user, null);
    }
    
    public function detail($id){
        if (!Auth::user()->can($this->controller.'-edit')){
            return $this->unauthorizedAccessModule();
        }  

        $customer = new Customer;
        $datas = $customer->get_data();

        $res = $datas->find($id);
        if($res == null){
            return $this->errorNotFound(null);
        }        
        return $this->ok($res, null);
    }

    public function delete($id){
        if (!Auth::user()->can($this->controller.'-delete')){
            return $this->unauthorizedAccessModule();
        }  

        $user = User::find($id);
        if (!$user) {
            return $this->errorNotFound(null);
        }
        if (!empty($user->asset_id)) {
            Asset::remove($user->asset_id);
        }
        $user->delete();

        return $this->deleted("Data deleted successfully");
    }

    public function delete_batch(Request $request) {
        if (!Auth::user()->can($this->controller.'-delete')){
            return $this->unauthorizedAccessModule();
        }  
    
        $ids = $request->input('id');
        foreach ($ids as $id) {
            $user = User::find($id);
            if (!$user) {
                return $this->errorNotFound(null);
            }
            if (!empty($user->asset_id)) {
                Asset::remove($user->asset_id);
            }
            $user->delete();
        }
    
        return $this->deleted("Data deleted successfully");
    }    

}
