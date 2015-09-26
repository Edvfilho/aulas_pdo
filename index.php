<?php
/**
 * Created by PhpStorm.
 * User: edvaldo
 * Date: 26/09/15
 * Time: 15:46
 */
try {
    $conexao = new \PDO("mysql:host=localhost;dbname=aula_edvaldo", "root", "nshedv");

    $query ='SELECT * from alunos';

    echo 'Listagem de Alunos'.'<br />'.'<br />';

    foreach($conexao->query($query) as $alunos) {
        echo $alunos['nome'].' - '.$alunos['nota'].'<br />';
    };

    echo '<br />'.'<br />';

    echo 'Tres Maiores Notas'.'<br />'.'<br />';

    $maior1 = 0;
    $aluno1 ='';

    $maior2 = 0;
    $aluno2 = '';

    $maior3 = 0;
    $aluno3 = '';

    $nota = 0;

    foreach($conexao->query($query) as $alunos) {

        $nota = intval($alunos['nota']);


        if($nota > $maior1):
         $maior1 = $nota;
         $aluno1 = $alunos['nome'];
        endif;


    };


    foreach($conexao->query($query) as $alunos2) {

        $nota = intval($alunos2['nota']);



        if($nota > $maior2 && $nota < $maior1):

                $maior2 = $nota;
                $aluno2 = $alunos2['nome'];

        endif;


    };


    foreach($conexao->query($query) as $alunos3) {

        $nota = intval($alunos3['nota']);



        if($nota > $maior3 && $nota < $maior2):
            $maior3 = $nota;
            $aluno3 = $alunos3['nome'];
        endif;

    };

    echo $aluno1.' - '.$maior1.'<br />';
    echo $aluno2.' - '.$maior2.'<br />';
    echo $aluno3.' - '.$maior3.'<br />';

   // $stmt = $conexao->query($query);
   // $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
   // print_r($resultado);
}
catch (\PDOException $e){
    echo "nao foi posivel estabelecer conexao com bnco de dados: erro: ".$e->getCode()." : ".$e->getMessage();
}