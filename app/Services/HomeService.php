<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class HomeService
{

    public function getOldPassword($id)
    {
        return DB::table('users')->where('id', '=', $id)->value('password');
    }

    public function updatePassword($user_id, $hash_new)
    {
            DB::table('users')->where('id', '=', $user_id)->update([
                'password' => $hash_new
            ]);

    }

}
