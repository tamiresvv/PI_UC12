<?php

/**
 * Description of clsCidadeDAO
 *
 * @author assparremberger
 * 26/10/2018
 */

class CidadeDAO {
    
    public static function inserir( $cidade ){
        $sql = "INSERT INTO cidades ( nome ) VALUES "
                . " ( '".$cidade->getNome()."' ); ";
        Conexao::executar($sql);
        
    }
    
    public static function editar( $cidade ){
        $sql =    "UPDATE cidades SET "
                . " nome = '".$cidade->getNome()."' "
                . " WHERE id = ".$cidade->getId();
        Conexao::executar($sql);
        
    }
    public static function excluir( $idCidade ){
        $sql =    "DELETE FROM cidades "
                . " WHERE id = ".$idCidade;
        Conexao::executar($sql);
        
    }
    
    public static function getCidades(){
        $sql = "SELECT id, nome FROM cidades ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_id, $_nome) = mysqli_fetch_row($result) ){
                $cidade = new Cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $lista->append($cidade);
            }
        }
        return $lista;
    }
    public static function getCidadeById( $id ){
        $sql = " SELECT c.id, c.nome"
             . " FROM cidades c "
             . " WHERE c.id = ".$id 
             . " ORDER BY c.nome ";
        $result = Conexao::consultar($sql);
        list($_id, $_nome) = mysqli_fetch_row($result);{
                $cidade = new Cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
        }        
        return $cidade;
    }
    
    
}
