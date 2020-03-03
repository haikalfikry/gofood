<?php date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("purple","\n=======================================================\n");
echo color("purple","Input 62 For ID and 1 For US Phone Number\n");
echo color("purple","=======================================================\n");

function change()
{
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("nevy","(•) Nomor : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"'))
	{
        	$otptoken = getStr('"otp_token":"','"',$register);
        	echo color("green","(+) Kode verifikasi sudah di kirim")."\n";
      		otp:
   	     	echo color("nevy","(•) Otp   : ");
        	$otp = trim(fgets(STDIN));
       		$data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        	$verif = request("/v5/customers/phone/verify", null, $data1);
        	if(strpos($verif, '"access_token"'))
		{
        		echo color("green","(+) Berhasil mendaftar");
        		$token = getStr('"access_token":"','"',$verif);
        		$uuid = getStr('"resource_owner_id":',',',$verif);
        		echo "\n".color("nevy","(•) Mau Redeem Voucher?: ");
        		$pilihan = trim(fgets(STDIN));
        		if($pilihan == "y" || $pilihan == "Y")
			{
        			echo color("yellow","=======================================================\n");
        			echo "\n".color("yellow","Claim voc 25k");
        			echo "\n".color("yellow","Please wait");
        			for($a=1;$a<=3;$a++){
        			echo color("yellow",".");
        			sleep(1);}
        			$code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-FNF7B6D"}');
        			$message = fetch_value($code1,'"message":"','"');
        			if(strpos($code1, 'Promo kamu sudah bisa dipakai'))
				{
        				echo "\n".color("green","Message : ".$message);
        				goto goride;
        			}
				else
				{
        				echo "\n".color("red","Message : ".$message);
        				echo "\n".color("yellow","Claim voc 20k");
        				echo "\n".color("yellow","Please wait");
        				for($a=1;$a<=3;$a++){
        				echo color("yellow",".");
        				sleep(1);}
        				sleep(3);
        				$santai11 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-6vzljms"}');
        				$messagesantai11 = fetch_value($santai11,'"message":"','"');
        				if(strpos($santai11, 'Promo kamu sudah bisa dipakai.'))
					{
        					echo "\n".color("green","Message : ".$messagesantai11);
        					goto goride;
        				}
					else
					{
        					echo "\n".color("red","Message : ".$messagesantai11);
        					echo "\n".color("yellow","Claim voc 15k");
       						echo "\n".color("yellow","Please wait");
        					for($a=1;$a<=3;$a++){
        					echo color("yellow",".");
        					sleep(1);}
        					sleep(3);
        					$santai08 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-43cgvqx"}');
        					$messagesantai08 = fetch_value($santai08,'"message":"','"');
        					if(strpos($santai08, 'Promo kamu sudah bisa dipakai.'))
						{
       		 					echo "\n".color("green","Message : ".$messagesantai08);
        						goto goride;
        					}
						else
						{
        						echo "\n".color("green","Message : ".$messagesantai08);
        						goride:
        						echo "\n".color("yellow","Claim voc COBAGORIDE");
        						echo "\n".color("yellow","Please wait");
       	 						for($a=1;$a<=3;$a++){
        						echo color("yellow",".");
        						sleep(1);}
        						sleep(3);
        						$goride = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGORIDE"}');
        						$message1 = fetch_value($goride,'"message":"','"');
        						echo "\n".color("green","Message : ".$message1);
        						echo "\n".color("yellow","Claim voc COBAGOCAR");
        						echo "\n".color("yellow","Please wait");
        						for($a=1;$a<=3;$a++){
        						echo color("yellow",".");
        						sleep(1);}
        						sleep(3);
        						$goride1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOCAR"}');
        						$message2 = fetch_value($goride1,'"message":"','"');
        						echo "\n".color("green","Message : ".$message2);
        						echo color("yellow","\n\n=======================================================");
        						sleep(3);
        						$cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        						$total = fetch_value($cekvoucher,'"total_vouchers":',',');
        						$voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        						$voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        						$voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        						$voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        						$voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        						$voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        						$voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        						echo "\n".color("yellow","Total voucher ".$total." : ");
        						echo "\n".color("green","1. ".$voucher1);
        						echo "\n".color("green","2. ".$voucher2);
        						echo "\n".color("green","3. ".$voucher3);
        						echo "\n".color("green","4. ".$voucher4);
        						echo "\n".color("green","5. ".$voucher5);
        						echo "\n".color("green","6. ".$voucher6);
        						echo "\n".color("green","7. ".$voucher7);
        						echo color("purple","\n=======================================================\n");
        						
         					}
         				}
        			}
         		}
			else
			{
         		die();
         		}
         	}
		else
		{
         		echo color("red","(-) Otp yang anda input salah, silahkan input kembali");
         		goto otp;
		}
	}
	else
	{
        	echo color("red","NOMOR SUDAH TERDAFTAR/SALAH !!!");
        	echo color("nevy","\n(•) Do You Want To Try Again? (y/n) : ");
        	$pilih = trim(fgets(STDIN));
        	if($pilih == "y" || $pilih == "Y")
		{
        		echo color("purple","\n=======================================================\n");
        		goto ulang;
        	}
		else
		{
			die();
		}
 	}
}
echo change()."\n"; ?>
