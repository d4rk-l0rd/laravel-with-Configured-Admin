<?php

namespace App\Http\Controllers;

use App\Services\RootService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{



    public function Password()
    {
        if (Auth::user()) {

            return view('admin.password_form');
        } else {

            Auth::logout();
            return redirect(url('/login'));

        }

    }

    public function updatePassword(Request $request)
    {
        if (Auth::user()) {
            $data = $request->all();
            $user_id = Auth::user()->id;

            try {

                if ($data['old'] != $data['new']) {
                    $old = $this->getRootService()->getHomeService()->getOldPassword($user_id);
                    if (Hash::check($data['old'], $old)) {
                        if ($data['new'] == $data['confirm']) {
                            $hash_new = Hash::make($data['new']);
                            $this->getRootService()->getHomeService()->updatePassword($user_id, $hash_new);
                            Session::flash('flash_message', 'Password Changed Successfully.');

                            return redirect(url('/admin/password'));
                        }else{
                            Session::flash('error_message', 'Password and Confirm Password Mismatch');
                            return redirect(url('/admin/password'));
                        }
                    }
                    Session::flash('error_message', 'Old Password Mismatch');
                    return redirect(url('/admin/password'));
                } else {
                    Session::flash('error_message', 'New Password Cannot be Old One');
                    return redirect(url('/admin/password'));
                }

            } catch (\Exception $e) {

                Log::error($e);
                Session::flash('error_message', 'Failed to Change Password. Please Try again');
                return redirect(url('/password'));
            }
        } else {
            Auth::logout();
            return redirect(url('/'));
        }


    }


    public $rootService = null;

    private function getRootService()
    {
        if ($this->rootService == null) {
            $this->rootService = new RootService();
        }
        return $this->rootService;
    }
}
