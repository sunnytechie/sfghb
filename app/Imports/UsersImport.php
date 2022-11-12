<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'login_type'    => $row[1],
            'is_admin'    => $row[2],
            'email'    => $row[3],
            'email_verified_at'    => $row[4],
            'password' => Hash::make($row[5]),
            'google_id'    => $row[6],
            'remember_token'    => $row[7],
            'created_at'    => $row[8],
            'updated_at'    => $row[9],
            'fcm_token'    => $row[10],
            'country'    => $row[11],
        ]);
    }
}
