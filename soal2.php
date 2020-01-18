<?php

function validasi($user, $passwd) {

    if ($user != null && $passwd != null) { //check apakah inputan null 
        if (strlen($user)>=8 && strlen($passwd)>=7) { // check apakah panjang inputan tidak lebih kecil dari 8
            if (!preg_match('@[A-Z]@', $passwd) ||	!preg_match('@[0-9]@', $passwd) ||
            !preg_match('@[^\w]@', $passwd)) { //regex untung mengeck apakah terdapat huruf besar, kecil, angka,dan spesial karakter
                $result = "Gagal, Kata Sandi Lemah\n";
return $result;
            }
            else {
                return true;
                exit();
            }
        }
        else {
            $result = "Nama pengguna atau kata sandi harus terdiri dari 8 karakter\n";
           return $result;
            exit();
        }
    }
    else {
        $result = "nama pengguna atau kata sandi tidak boleh kosong\n";
        return $result;
        exit();
    }


}

echo "input username : ";           //get input from user
$username = trim(fgets(STDIN));

echo "password : ";                 //get input from user
$password = trim(fgets(STDIN));


function validuserpw($user, $passwd) {
if($user == '$username' && $passwd == '$password'){
$result = "berhasil, user Dan password sessuai\n";
return $result;
} else {
$result = "user Dan password tidak sesuai\n";
return $result;
}
}

$cekvalid = validasi($username,$password);
if($cekvalid == true){
$validuserpw = validuserpw($username,$password);
echo $validuserpw;
} else {
echo $cekvalid;
}