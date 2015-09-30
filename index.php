<?php
/**
 * Created by PhpStorm.
 * User: edvaldo
 * Date: 26/09/15
 * Time: 15:46
 */
try {
    $conexao = new \PDO("mysql:host=localhost;dbname=aula_edvaldo", "root", "nshedv");

    $query ='SELECT * from alunos order by nota DESC ';

    echo 'Listagem de Alunos'.'<br />'.'<br />';

    foreach($conexao->query($query) as $alunos) {
        echo $alunos['nome'].' - '.$alunos['nota'].'<br />';
    };

    echo '<br />'.'<br />';

    echo 'Tres Maiores Notas'.'<br />'.'<br />';

    $query ='SELECT * from alunos order by nota DESC LIMIT 3 ';

    foreach($conexao->query($query) as $alunos) {
        echo $alunos['nome'].' - '.$alunos['nota'].'<br />';
    };

   // $stmt = $conexao->query($query);
   // $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
   // print_r($resultado);
}
catch (\PDOException $e){
    echo "nao foi posivel estabelecer conexao com banco de dados: erro: ".$e->getCode()." : ".$e->getMessage();
}