<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['title']              = 'List User';
        $data['user']               = User::get();
        return view('admin.user.list')->with($data);
    }

   
    public function create()
    {
        $data['title']              = 'Tambah Pengguna';
        return view('admin.user.create')->with($data);
    }

    
    public function store(Request $request)
    {
        $data = User::create([ 
            'name'  		        => $request->name,
            'email' 			    => $request->email,
            'password'	    		=> Hash::make($request->password)
        ]);

        return redirect('admin/user')->with('SUCCESSMSG','Data Berhasil di Tambah');
    }

   
    public function show()
    {
        $total                      = User::get()->count();
		$length                     = intval($_REQUEST['length']);
		$length                     = $length < 0 ? $total: $length; 
		$start                      = intval($_REQUEST['start']);
		$draw                       = intval($_REQUEST['draw']);
		
		$search                     = $_REQUEST['search']["value"];
		
		$output                     = array();
		$output['data']             = array();
		
		$end                        = $start + $length;
		$end                        = $end > $total ? $total : $end;

		$query                      = User::take($length)->skip($start)->orderBy('id','DESC')->get();
		
		if($search!=""){
        $query                      = User::orWhere('name','like','%'.$search.'%')->orderBy('id','DESC')->get();
		$output['recordsTotal']     = $output['recordsFiltered']=$query->count();
		}

		$no=$start+1;
		foreach ($query as $user) {
            if ($user->id == 1 ){
                $cek = "<a class='btn btn-warning btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".url('admin/user/'.$user->id.'/edit')."><i class='fa fa-pencil'></i></a>
                ";
                }else{
                $cek= "<a class='btn btn-warning btn-sm' type='button' data-toggle='tooltip'  title='Edit'  href=".url('admin/user/'.$user->id.'/edit')."><i class='fa fa-pencil'></i></a>
                            <a href='javascript:void(0);' onclick='hapusid($user->id)' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </a>
                            ";
                }
           $output['data'][]=
					array(
						$no,
						$user->email,
						$user->name,
                        $cek
                );
		$no++;
		}
		
		$output['draw']             = $draw;
		$output['recordsTotal']     = $total;
		$output['recordsFiltered']  = $total;
		
		echo json_encode($output);
    }

   
    public function edit($id)
    {
        $data['title'] 				= 'Edit User';
        $query 	                    = User::where('id',$id)->get();
        
        if($query->count() > 0){
            
            foreach($query as $db){
                $data['id']			= $id;
                $data['name']		= $db->name;
                $data['email']	    = $db->email;
                
            }
        }
        else{
                $data['id']		    = $id;
                $data['name']		= '';
                $data['email']		= '';
            
        }
        return view('admin.user.edit')->with($data);
    }

   
    public function update(Request $request)
    {
        $data =[ 
            'name'  		        => $request->name,
            'email' 			    => $request->email,
            'password'	    		=> Hash::make($request->password)
        ];
        $id						    = $request->id;
       

        if(empty($request->password)){
            User::where('id','=',$id)->update(array('email'=>$request->email,'name'=>$request->name));
            return redirect('admin/user')->with('SUCCESSMSG','Data Berhasil di Update');
        }else{
            User::where('id','=',$id)->update($data);
            return redirect('admin/user')->with('SUCCESSMSG','Data Berhasil di Update');
        }
        
    }

    public function destroy(Request $request)
    {
        $id                         = $request->id;
        $user                       = User::find($id);
        $user->delete();
    }

    public function cekemail(Request $request)
	{
		$email          = $request->email;
		$cek            = User::select('email')->where('email',$email)->get();
		if($cek->count() == 0)
		{
			echo "true";
		
		}
		else
		{
			echo "false";
		}
	}
}
