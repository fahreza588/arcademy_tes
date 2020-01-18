<?php 
class biodata
{
	
	public function cetak($nama, $umur, $alamat, $hobi, $is_married, $list_sekolah, $skill, $keinginan){
		$datasaya = [
		'name'					        => $nama,
		'age'					        => $umur,
		'address'				        => $alamat,
		'hobbies'				        => $hobi, //Array
		'is_married'				    	=> $is_married, //Boolean
		'list_school'				    	=> $list_sekolah,
		'skills'				        => $skill,
		'interest_in_coding'				=> $keinginan,
		];
		return json_encode($datasaya);
	}
}
		$nama  			= "Fahreza";
		$umur 			= "20";
		$alamat  		= "Jl. Berlian Komplek THR gang Basirih 1";
		$hobi	  		= ["gaming"];
		$is_married  		= false;
		$list_school  		= ["highSchool"=>"SMK Muhammadiyah 2 Banjarmasin"];
		$skill  		= ["HTML"=>"Beginner", "Web Developer"=>"Beginner"];
		$keinginan			= true;
		$bio 				= new biodata();
		echo $bio->cetak($nama, $umur, $alamat, $hobi, $is_married, $list_school, $skill, $keinginan);
 ?>