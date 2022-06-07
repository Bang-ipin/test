<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Paginator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $title                      = 'List Customer';
        $keyword                    = $request->keyword;
        $customer                   = Customer::where('name','LIKE','%'.$keyword.'%')->orWhere('created_at','LIKE','%'.$keyword.'%')->orderBy('name','ASC')->paginate(10);
        return view('admin.customer.list',compact(['customer','title']));
    }
    public function create()
    {
        $data['title']              = 'Add Customer';
        
        return view('admin.customer.create')->with($data);
    }

    
    public function store(Request $request)
    {
        $name                       = $request->name;
        $address                    = $request->address;
        $phone                      = $request->phone;
        if($name=='' || $address=='' || $phone==''){
            return response()->json([
                'status' => 0,
                'message' => "<div role='alert' class='alert alert-danger'><button data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span><span class='sr-only'>Close</span></button>
                            <strong>Gagal!</strong> Form is required</div>"
            ]);

        }
            $data = [ 
                'name'  		        => $name,
                'address' 			    => $address,
                'phone'	    		    => $phone,
            ];
            Customer::create($data);
            return response()->json([
                'status' => 1,
                'message' => "<div role='alert' class='alert alert-success'><button data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span><span class='sr-only'>Close</span></button>
                            <strong>Save!</strong> Successfully</div>"
            ],200);
    }
   
    public function edit($id)
    {
        $data['title'] 				= 'Edit Customer';

        $query 	                    = Customer::where('id',$id)->get();
        
        if($query->count() > 0){
            
            foreach($query as $db){
                $data['id']			= $id;
                $data['name']		= $db->name;
                $data['address']    = $db->address;
                $data['phone']      = $db->phone;
                
            }
        }
        else{
                $data['id']		    = $id;
                $data['name']		= '';
                $data['address']    = '';
                $data['phone']      = '';
            
        }
        return view('admin.customer.edit')->with($data);
    }

   
    public function update(Request $request)
    {
        $id                         = $request->id;
        $name                       = $request->name;
        $address                    = $request->address;
        $phone                      = $request->phone;
        if($name=='' || $address=='' || $phone==''){
            return response()->json([
                'status' => 0,
                'message' => "<div role='alert' class='alert alert-danger'><button data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span><span class='sr-only'>Close</span></button>
                            <strong>Gagal!</strong> Form is required</div>"
            ]);

        }
        $data = [ 
            'name'  		        => $name,
            'address' 			    => $address,
            'phone'	    		    => $phone,
        ];
        Customer::where('id',$id)->update($data);
    }

    public function destroy(Request $request)
    {
        $id                         = $request->id;
        Customer::where('id', $id)->delete();
        return response()->json([
            'status' => 1,
            'message' => "<div role='alert' class='alert alert-success'><button data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>x</span><span class='sr-only'>Close</span></button>
                        <strong>Success!</strong> Delete Successfully</div>"
        ],200);
    }

    // public function cekemail(Request $request)
	// {
	// 	$email          = $request->email;
	// 	$cek            = Customer::select('email')->where('email',$email)->get();
	// 	if($cek->count() == 0)
	// 	{
	// 		echo "true";
		
	// 	}
	// 	else
	// 	{
	// 		echo "false";
	// 	}
	// }
}
