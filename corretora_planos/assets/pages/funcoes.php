<?php

    function gerarContrato(){

        $dadosContrato = array();

        if(isset($_SESSION['array-nomes'])){
            $nomePlano = $_SESSION['nome-plano'];

            $numRegistros = sizeof($_SESSION['array-nomes']); 

            $nomes = $_SESSION['array-nomes'];
            $idades = $_SESSION['array-idades'];
            $faixas = $_SESSION['array-faixas'];
            $precos = $_SESSION['array-precos'];

            $total = $_SESSION['total'];

            // Informações complementares:
            $dadosContrato['info'] = array(
                'plano' => $nomePlano,
                'vidas' => $numRegistros,
                'valor_contrato' => $total
            );

            // Dados dos integrantes do contrato:
            for($i = 0; $i < $numRegistros; $i++){

                $dadosContrato[] = array(
                    'nome' => $nomes[$i],
                    'idade' => $idades[$i],
                    'faixa' => $faixas[$i],
                    'preco' => $precos[$i]
                );
            }
        }
 
        return $dadosContrato;
    }//end gerarContrato()

?>