<?php
namespace App\Http\Controllers\Dashboard;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Hash;
class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:مجموعات المستخدمين', ['only' => ['index', 'login_history']]);
        $this->middleware('permission:اضافة مستخدم', ['only' => ['create','store']]);
        $this->middleware('permission:تعديل مستخدم', ['only' => ['edit','update']]);
        $this->middleware('permission:حذف مستخدم', ['only' => ['show']]);
    }


    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
        return view('dashboard.users.show_users',compact('data'));
    }


    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('dashboard.users.Add_user',compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles_name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles_name'));
        toast('تم اضافة المستخدم بنجاح','success');
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('dashboard.users.edit',compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles_name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles_name'));
        toast('تم تعديل المستخدم بنجاح','success');
        return redirect()->route('users.index');
    }


    //destroy
    public function show($id)
    {
        User::find($id)->delete();
        toast('تم حذف المستخدم بنجاح','success');
        return redirect()->route('users.index');
    }


    /*
    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();
        return redirect()->route('users.index')->with('success','تم حذف المستخدم بنجاح');
    }
    */


    public function login_history(){
        $histories = History::all();
        return view('dashboard.users.login_history', compact('histories'));
    }
}
