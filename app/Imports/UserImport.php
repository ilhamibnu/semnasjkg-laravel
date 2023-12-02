<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'nim' => $row[0],
            'email' => $row[0] . '@semnasjkgsby.com',
            'password' => $row[0],
            'id_role' => $row[4],
            'id_kampus' => $row[5],
            'id_jenis_peserta' => $row[6],
        ]);
    }
}
