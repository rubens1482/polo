<?php

	include_once("conexao.php");
	
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			if($primeira_linha == false){
				$matricula = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "Matricula: $matricula <br>";
				
				$tipo = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Tipo: $tipo <br>";
				
				$situacao = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "Situacao: $situacao <br>";
				
				$nome = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "Nome: $nome <br>";
				
				$identidade = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "Identidade: $identidade <br>";
				
				$placa = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "Placa: $placa <br>";				
				
				$veiculo = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				echo "Veiculo: $veiculo <br>";
				
				$cidade = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
				echo "Cidade: $cidade <br>";
				
				$uf = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
				echo "UF: $uf <br>";
				
				$empresa = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
				echo "Empresa: $empresa <br>";	

                $datacadastro = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
				echo "Data Cadastro: $datacadastro <br>";					
				
				echo "<hr>";
				
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO tb_cadastro (matricula, tipo, situacao, nome, identidade, placa, veiculo, cidade, uf, empresa, datacadastro) VALUES ('$matricula', '$tipo', '$situacao', '$nome', '$identidade', '$placa', '$veiculo', '$cidade', '$uf', '$empresa', '$datacadastro')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			}
			$primeira_linha = false;
		}
	}
?>