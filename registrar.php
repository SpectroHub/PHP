<?php
		
		include_once 'conexao.php';
		
		$nome = $_POST['nome'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$numero=$_POST['numero'];
		$cpf=$_POST['cpf'];
		
		
		$sql1 = $dbcon->query("SELECT * FROM tblogin WHERE email = '$email'");
		$sql2 = $dbcon->query("SELECT * FROM tblogin WHERE numero = '$numero'");
		$sql3 = $dbcon->query("SELECT * FROM tblogin WHERE cpf = '$cpf'");
		
		if(mysqli_num_rows($sql1)>0)
		{
			echo "email_erro";
		}
		else if(mysqli_num_rows($sql2)>0)
		{
			echo "numero_erro";
		}
		else if(mysqli_num_rows($sql3)>0)
		{
			echo "cpf_erro";
		}		
		else
		{
			$sql4 = $dbcon->query("INSERT INTO tblogin(nome,email,senha,numero,cpf) VALUES('$nome','$email','$senha', '$numero', '$cpf')");
			
			if($sql4){
				echo "Registro_OK";
			}
			else
			{
				echo "Registro_ERRO";
			}
		}
?>