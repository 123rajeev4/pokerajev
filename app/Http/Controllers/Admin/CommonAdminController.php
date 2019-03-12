<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Officer;
use App\User;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class CommonAdminController extends Controller
{
    public function upload_image(Request $request, $dirNmae = null, $resizeDirName = null)
    {
        if (!empty($request->image)) {
            $image = ($request->file('image'));
            if (!empty($image)) {
                $dirName       = !empty($dirName) ? $dirName : "profile";
                $resizeDirName = !empty($resizeDirName) ? $resizeDirName : "profile_resize";
                $extension     = $image->getClientOriginalExtension(); // getting image
                $fileName      = date("YmdHis") . mt_rand(100000, 999999) . '.' . $extension;
                $path          = public_path($dirName . '/' . $fileName);
                $pathResize    = public_path($resizeDirName . '/' . $fileName);
                Image::make($image->getRealPath())->save($path);
                Image::make($image->getRealPath())->resize(300, 300)->save($pathResize);
                return $fileName;
            } else {
               $request->session()->flash('alert-danger', 'Image is required.');
            }
        } else {
            $request->session()->flash('alert-danger', 'Image is required.');
        }
    }

    public function upload_file(Request $request,$file_name=null,$folder_name = null)
    {
        if (!empty($file_name)) {
            $user_file = ($request->file($file_name)); 
            if (!empty($user_file)) {
                $folder_name            = !empty($folder_name) ? $folder_name : "attachment";
                $destinationPath = public_path() . '/' . $folder_name . '/';
                $extension       = $user_file->getClientOriginalExtension(); // getting file
                $fileName        = date("YmdHis") . mt_rand(100000, 999999) . '.' . $extension;
                $user_file->move($destinationPath, $fileName);
                $user_file = $fileName;
                return $user_file;
            } else {
                $this->error_message("File is required.", "upload_file");
            }
        } else {
            $this->error_message("File  name is required.", "upload_file");
        }
    }

    public function is_file($folder_name = null, $file_name = null)
    {
        $path = url('/public/img/user-default.png');
        if (!empty($folder_name) && !empty($file_name)) {
            $file_path = public_path() . '/' . $folder_name . '/' . $file_name;
            if (file_exists($file_path)) {
                $path = url('/') . '/public/' . $folder_name . '/' . $file_name;
            }
        }
        return $path;
    }

    public function get_date_formate($currentDate = '', $pastDate = '')
    {
        if (!empty($pastDate) && !empty($currentDate)) {
            $pastDate    = new DateTime($pastDate);
            $currentDate = new DateTime($currentDate);
            $interval    = $pastDate->diff($currentDate);
            $date        = "";
            if ($interval->format("%a") != "0") {
                $date = $interval->format("%a Days Ago");
            }
            if ($interval->format("%m") != "0") {
                $date = $interval->format("%m Month");
            }
            if ($interval->format("%Y") != "0") {
                $date = $interval->format("%Y Year");
            }
            if ($interval->format("%a") == "1") {
                $date = "Yesterday";
            }
            if ($interval->format("%a") == "0") {
                $date = "Today";
            }
            return $date;
        } else {
            return false;
        }
    }

    public function view(Request $request)
    {
        if (!empty($request->id) && !empty($request->table)) {
            $data = DB::table($request->table)->where('id',$request->id)->first();
            if (!empty($data->image)) {
                if (file_exists(public_path('/profile_resize/').$data->image)) {
                    $data->image = url('/public/profile')."/".$data->image;
                }else{
                    $data->image = $data->image;
                }
            }else{
                $data->image = url("/public/img/admins/img")."/no_image.png";
            }
            
            $data = json_encode($data);
           print_r($data);
        }else{
            return false;
        }
    }
}
