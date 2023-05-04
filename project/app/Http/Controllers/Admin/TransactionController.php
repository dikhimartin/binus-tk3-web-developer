<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\TransactionDetail;
use App\Traits\RespondsWithHttpStatus;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    use RespondsWithHttpStatus;
    
    private $controller = 'transaction';

    private function title(){
        return __('main.transaction_list');
    }

    public function __construct() {
        $this->middleware('auth');
    }     

    public function index(){
        if (!Auth::user()->can($this->controller.'-list')){
            return view('backend.errors.401')->with(['url' => '/admin']);
        }

        return view('backend.'.$this->controller.'.list')->with(array('controller' => $this->controller, 'pages_title' => $this->title()));
    }

    public function get_data(Request $request){
        if (!Auth::user()->can($this->controller.'-list')){
            return $this->unauthorizedAccessModule();
        }        

        $trx = new Transaction;
        $datas = $trx->get_data();

        return DataTables::of($datas)
        ->filter(function ($query) use ($request) {
            $query->when($request->has('search.value'), function ($q) use ($request) {
                $value = $request->input('search.value');
                $q->where(function ($query) use ($value) {
                    $query->where('transactions.transaction_date', 'like', "%$value%")
                        ->orWhere('transactions.status_transaction', 'like', "%$value%");
                });
            });
        })
        ->addColumn('action', function ($data) {
            // add your action column logic here
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
    public function detail($id){
        if (!Auth::user()->can($this->controller.'-edit')){
            return $this->unauthorizedAccessModule();
        }  

        $trx = new Transaction;
        $datas = $trx->get_data();

        $res = $datas->find($id);
        if(!$res){
            return $this->errorNotFound(null);
        }    

        return $this->ok($res, null);
    }

    public function delete($id){
        if (!Auth::user()->can($this->controller.'-delete')){
            return $this->unauthorizedAccessModule();
        }  

        $res = Transaction::find($id);
        if (!$res) {
            return $this->errorNotFound(null);
        }
        $res->delete();
        TransactionDetail::whereIn('transaction_id', $id)->delete();
        
        return $this->deleted("Data deleted successfully");
    }

    public function delete_batch(Request $request) {
        if (!Auth::user()->can($this->controller.'-delete')){
            return $this->unauthorizedAccessModule();
        }  

        $ids = $request->input('id');
        Transaction::whereIn('id', $ids)->delete();
        TransactionDetail::whereIn('transaction_id', $ids)->delete();

        return $this->deleted("Data deleted successfully");
    }

}
