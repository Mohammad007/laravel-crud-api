<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Validator;

class UserController extends Controller
{
    public function show_list(){
        $data = UserModel::all();
        return response()->json(["status" => 200,"message" => "Data fetch..", "data" => $data]);
    }

    public function add_user(Request $request){

        // Validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $AddUser = new UserModel;
        $AddUser->name = $request->name;
        $AddUser->email = $request->email;
        $AddUser->address = $request->address;

        if ($AddUser->save()) {
            return response()->json(["message" => "Data insert!", "status" => 200]);
        } else {
            return response()->json(["message" => "Data not insert", "status" => 404]);
        }

    }

    public function update_user(Request $request, $id)
    {

        // Validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $UpdateUser = UserModel::where('id', $id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "address" => $request->address
        ]);

        if ($UpdateUser) {
            return response()->json(["message" => "Data update!", "status" => 200]);
        } else {
            return response()->json(["message" => "Data not update", "status" => 404]);
        }
    }

    public function delete_user($id){
        $data = UserModel::destroy($id);

        if ($data) {
            return response()->json(["message" => "Data deleted!", "status" => 200]);
        } else {
            return response()->json(["message" => "Data not deleted", "status" => 404]);
        }
    }
}
