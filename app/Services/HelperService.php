<?php

namespace App\Services;

use App\Models\MasterOtp;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HelperService
{

    /** String Convert to String Mask*/
    public static function stringMask(String $text, int $mask, bool $is_mobile = false)
    {

        if ($is_mobile) {
            $first_char = mb_substr($text, 0, 1);
            $other_char = str_pad(substr($text, -$mask), strlen($text) - 1, 'x', STR_PAD_LEFT);
            $mask_sting = $first_char . $other_char;
        } else {
            $mask_sting = str_pad(substr($text, -$mask), strlen($text), 'x', STR_PAD_LEFT);
        }

        return $mask_sting;
    }

    /** String Convert to Slug*/
    public static function slugify(String $text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /** SMS Send Service */
    public static function createOtp()
    {
        if (env('PRODUCTION', false)) {
            $otp = rand(100000, 999999);
        } else {
            $otp = 123456;
        }
        return $otp;
    }

    public static function sendMessage($number, $message, $otp = '')
    {
        if (!empty($otp)) {
            $data = [
                'mobile_no' => $number,
                'otp' => $otp,
                'role_id' => 4
            ];
            MasterOtp::create($data);
        }

        if (env('PRODUCTION', false)) {
            $curl = curl_init();

            try {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => '{ "sender": "COMONSETUP", "route": "4", "country": "91", "sms": [ { "message": "' . $message . '", "to": [ "' . $number . '" ] } ] }',
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HTTPHEADER => array(
                        "authkey: 342058A50bp5Jx5f6493e3P1",
                        "content-type: application/json"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                dd($response, $err);
                curl_close($curl);
            } catch (\Exception $e) {
                return false;
            }
            return true;
        } else {
            return true;
        }
    }

    /**
     * check the file in public Path.
     *
     * @param  App\Http\Requests\AdminRequest $request
     * @param  string  $url
     * @return string
     */
    public static function file_exists_public_path($url)
    {
        if (file_exists(public_path() . $url)) {
            return url('/') . $url;
        } else {
            return url('/') . '/image-not-found.png';
        }
    }

    /**
     * Upload file in storage.
     *
     * @param  App\Http\Requests\AdminRequest $request
     * @param  String  $key
     * @param  String  $url public/upload/.$url
     * @param  String  $name
     * @return bool
     */
    public static function imageUploader(Request $request, $key, $url, $name = '')
    {
        $image_name = "";
        if ($request->hasFile($key)) {
            $image = $request->file($key);
            $ext = $image->getClientOriginalExtension() !== "" ? $image->getClientOriginalExtension() : $image->extension();

            if ($name) {
                $image_name = $name;
            } else {
                $image_name = $name . time() . '_' . uniqid() . '.' . $ext;
            }
            // dd($url, $image, $image_name, 'public');
            $path = Storage::disk('local')->putFileAs('public/' . $url, $image, $image_name, 'public');
            // dd($path);
            return $image_name;
        } else {
            return null;
        }
    }

    /**
     * Upload Multiple file in storage.
     *
     * @param  App\Http\Requests\AdminRequest $request
     * @param  String  $key
     * @param  String  $url public/upload/.$url
     * @param  String  $name
     * @return array
     */
    public static function multipleImageUploader(Request $request, $key, $url, $name = '')
    {
        $image_name = [];
        if ($request->hasFile($key)) {
            foreach ($request->file($key) as $image) {
                // $image = $request->file($key);
                $ext = $image->getClientOriginalExtension() !== "" ? $image->getClientOriginalExtension() : $image->extension();

                if ($name) {
                    $image_name_str = $name;
                } else {
                    $image_name_str = $name . time() . '_' . uniqid() . '.' . $ext;
                }
                $path = Storage::disk('local')->putFileAs('public/' . $url, $image, $image_name_str, 'public');
                array_push($image_name, $image_name_str);
            }
            return $image_name;
        } else {
            return [];
        }
    }

    public static function removeImage(Model $model, String $column_name, $url)
    {
        if ($model->getOriginal($column_name) != "" && $model->getOriginal($column_name) != null) {
            if (Storage::disk('local')->exists('public/' . $url . '/' . $model->getOriginal($column_name))) {
                $file = $url . '/' . $model->getOriginal($column_name);
                Storage::disk('local')->delete($file);
            }
        }
    }

    /**
     * check the file in strorage Path.
     *
     * @param  App\Http\Requests\AdminRequest $request
     * @param  string  $url
     * @return string
     */
    public static function getFileUrl($file_url, $file_name = null)
    {
        // dd($file_url, $file_name);
        if ($file_name == null) {
            $url = url('/') . '/image-not-found.png';
            // $url = self::file_exists_storage_path($file_url.'demo' );
        } else {
            // if(filter_var($file_name, FILTER_VALIDATE_URL)){
            //     $url =  $file_name;
            // }else{
            $url = self::file_exists_storage_path($file_url . $file_name);
            // }
        }
        return $url;
    }

    /**
     * check the file in strorage Path.
     *
     * @param  App\Http\Requests\AdminRequest $request
     * @param  string  $url
     * @return string
     */
    public static function file_exists_storage_path($url)
    {
        // dd($url);
        if (Storage::disk('local')->exists('public/' . $url)) {
            $path = Storage::disk('local')->url($url);
        } else {
            $path = url('/') . '/image-not-found.png';
        }

        // dd(Storage::disk('local')->url($url));
        // $path = Storage::disk('local')->url($url);
        // dd($path);
        return $path;
    }

    /** Nesteted Array convert into single Array*/
    public static function objectToSingleArray(object $data, $key, $date = false)
    {

        $singleDimArray = [];
        foreach ($data as $item) {
            if ($date) {
                $date_f = date('d-m-Y', strtotime($item->$key));
                array_push($singleDimArray, $date_f);
            } else {
                array_push($singleDimArray, $item->$key);
            }
        }
        return $singleDimArray;
    }
}
