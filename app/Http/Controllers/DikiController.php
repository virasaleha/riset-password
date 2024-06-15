<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DikiController extends Controller
{
    public function enkripsi(Request $request)
    {
        $encrypted = Crypt::encryptString('$request->text');
        $decrypted = Crypt::decryptString($encrypted);

        return view('enkripsi', [
            'encrypted' => $encrypted,
            'decrypted' => $decrypted
        ]);
    }

    public function data()
{
    $parameter = [
        'nama' => 'vira saleha',
        'pekerjaan' => 'pejabat',
    ];
    $encrypted = Crypt::encrypt($parameter);
    return view('data', ['encrypted' => $encrypted]);
    echo "<a href='/data/".$encrypted."'>Klik</a>";
}

public function data_proses($data)
{
    $decrypted = Crypt::decrypt($data);
    return view('data_proses', ['data' => $decrypted]);
    echo "Nama : " . $decrypted['nama'] . "<br/>";
    echo "Pekerjaan : " . $decrypted['pekerjaan'];
}


}
