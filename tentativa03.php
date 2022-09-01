
<?php   error_reporting(E_ALL);
ini_set("display_errors",1 );?>
        <form method="get" action="tentativa03.php" class="form">
        	
    
                Nome:
                <input type="text" name="nome"/>
                <br></br>
            
                
                Seu Peso: 
                <input type="text" name="peso" required/>
                <br></br>
                    

                Sua Altura (Use Pontuação: 1.99 Em METROS):
                <input type="text" name="altura" required/>
                <br></br>
                
                <input type="submit" name="envia" value="CALCULAR IMC" style="color: <?= random_color()?>;">
                <br></br>

        <?php 

        $nome = $_GET['nome'];
		$peso = $_GET['peso'];
		$altura = $_GET['altura'];


        
		// imc = peso / altura²);
        function imc($p, $a){   
            $imc = $p / ($a ** 2);
            return $imc;
        }
         imc($peso, $altura);
        
        ?>
        </form>
        <?php
		$resultado = number_format(imc($peso, $altura));
		
        function resultado($resultado){
            if(isset($resultado) && $resultado != '0'){}
            return $resultado;
        };


        $valores = [
        18.5 => "Peso Pena",
        24.9 => "na média",
        29.9 => "Um pouco a cima do peso, mas ta suave",
        34.9 => "Fordo",
        39.9 => "acima do peso",
        40.0 => "na hora de procurar um Cardiologista",
        49.0 => "na hora de procurar um Cardiologista"
    ];
     

        foreach($valores as $chave => $value){
            if(imc($peso, $altura) <= $chave){
              
                echo " Seu IMC é: ", resultado($resultado), "<br></br> $nome"," está ",$value;
                break;
            }
        }

       

        function random_color($start = 0x000000, $end = 0xFFFFFF) {
            return sprintf('#%06x', mt_rand($start, $end));
         }
		?>
			
