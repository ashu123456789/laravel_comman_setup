<?php




namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Arr;

use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{
    // Get User
    public function getUsers()
    {
        $users = User::all();
        return response()->json([
            'status' => true,
            'data' => $users,
        ]);
    }


    // Update User
    public function update(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($user->id);
        $user = $user->update($input);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'user update successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'user not update !',
            ]);
        }
    }

    // Delete User
    public function delete()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $user = User::where('id', $user->id)->delete();
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'user Deleted successfully!',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'user not Delete !',
            ]);
        }
    }
}
