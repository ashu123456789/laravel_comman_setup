<?php




namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Services\HelperService;


class AuthController extends Controller
{
    // login
    public function login(Request $request)
    {

        $input = $request->only('email', 'password');
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'data' => $user,
            'token' => $jwt_token,
        ]);
    }

    // SignUp
    public function register(Request $request)
    {
        $input = $request->except(['_token']);
        $image = HelperService::imageUploader($request, 'image', 'files/users/');
        if ($image != null) {
            $input['image'] = $image;
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $input['image'];
        $user->save();
        $input = $request->only('email', 'password');


        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'status' => true,
            'data' => $user,
            'token' => $jwt_token,
        ], Response::HTTP_OK);
    }


    // Logout
    public function logout(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'status' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
