<?php 
class Login extends Koneksi{

	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;	
	}

	public function prosesLogin($username,$password)
	{
		
			//Admin
			$stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password ");
			$stmt->execute(array(":username"=> $username,":password"=>$password));
			$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

			//Petugas
			$stmt2 = $this->conn->prepare("SELECT * FROM petugas WHERE username = :username AND password = :password ");
			$stmt2->execute(array(":username"=> $username,":password"=> $password));
			$petugas = $stmt2->fetch(PDO::FETCH_ASSOC);

			//kasir
			$stmt3 = $this->conn->prepare("SELECT * FROM bank WHERE username = :username AND password = :password ");
			$stmt3->execute(array(":username"=>$username,":password"=>$password));
			$kasir = $stmt3->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1){
				$_SESSION['admin_session'] = $userRow['username'];
				$_SESSION['pass_admin'] = $userRow['password'];
				header('location:admin/admin.php');	
				return true;
			}else if($stmt2->rowCount() == 1){
				$_SESSION['session_petugas'] = $petugas['username'];
				$_SESSION['pass_petugas'] = $petugas['password'];
				header('location:petugas/petugas.php');
			}else if($stmt3->rowCount() == 1){
				$_SESSION['session_bank'] = $kasir['username'];
				$_SESSION['pass_bank'] = $kasir['password'];
				header('location:kasir/kasir.php');
			}else{
				return false;
			}

		
}

	public function isLoggedIn(){
		if(isset($_SESSION['admin_session']))
		{
			return true;
		}
		else if(isset($_SESSION['session_petugas']))
		{
			return true;
		}
		else if(isset($_SESSION['session_kasir']))
		{
			return true;
		}else{
			return false;
		}
	}

	public function redirect($url)
	{
		header("location:$url");
	}
}
?>
