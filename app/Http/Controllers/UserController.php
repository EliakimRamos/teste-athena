<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * @return [type]
     */
    public function create() {
        $categories = Category::all();
        return Inertia::render('Auth/Register',['categories'=>$categories]);
    }

    public function store(UserRequest $request)
    {
            $payload = $request->validated();
            User::create([
                'name' => $payload['name'],
                'email' => $payload['email'],
                'category_id' => $payload['category_id']['value'],
                'password' => Hash::make($payload['password']),
            ]);
            return Redirect::route('dashboard',['message'=> 'User Cadastrado com sucesso', 'status'=>1]);
    }

    public function index(string $message= null, bool $status=null ){
        $users = User::with('Category')->paginate(5);
        return Inertia::render('Dashboard', ['users' => $users, 'message'=> $message,'status'=>$status]);
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $user = User::find($id);
            if ($user) {
                $user->deleteProfilePhoto();
                $user->tokens->each->delete();
                $user->delete();
               return Redirect::route('dashboard', ['message'=> 'User Excluido com sucesso', 'status'=>1]);
            } else {
                return Redirect::route('dashboard', ['message'=> 'Error ao excluir o User ', 'status'=>0]);
            }
        }
    }

    public function show ($id) {
        $categories = Category::all();
        $user = User::find($id);
        return Inertia::render('Auth/UpdateUser',['categories'=>$categories, 'user' => $user]);
    }

    public function update ($id, UserUpdateRequest $request)
    {
        if (!empty($id)) {
           $user = User::find($id);
           if($user) {
               $user->name = $request->get('name');
               $user->email = $request->get('email');
               $user->category_id = $request->get('category_id')['value'];
               if($request->get('password')) {
                   $user->password = Hash::make($request->get('password'));
               }
              if ($user->save()){
                return Redirect::route('dashboard', ['message'=> 'Usuário Editado com sucesso', 'status'=>1]);
              } else {
                return Redirect::route('dashboard', ['message'=> 'Error ao editar o Usuário ','status'=>0 ]);
              }
           }
        }
    }

}
