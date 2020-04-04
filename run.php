<?php

error_reporting(0);
include ("func.php");
nope:
echo "\e[?] Masukkan Nomor HP Anda Wajib no +62 : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor Telah Terdaftar\n";
			goto nope;
    }
  else
    {
echo "\e[!] Siapkan OTPmu\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] Failed Get OTP!\n";
    }
  else
    {
    otp:
    echo "\e[!] Masukkan Kode Verifikasi (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kode Verifikasi Salah\n";
        goto otp;
        }
      else
        {
            echo "\e[!] Daftar sukses !\n";
    }
    }
    }


?>
