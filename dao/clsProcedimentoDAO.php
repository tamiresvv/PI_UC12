<?php

class ProcedimentoDAO {
    public static function inserir( $procedimento ){
        $sql = "INSERT INTO procedimentos ( nome, valor ) VALUES "
                . " ( '".$procedimento->getNome()."' , "
                . "   ".$procedimento->getValor()." ); ";
        Conexao::executar($sql);
        
    }
    
    public static function editar( $procedimento ){
        $sql =    "UPDATE procedimentos SET "
                . " nome = '".$procedimento->getNome()."' , "
                . " valor = ".$procedimento->getValor()." "
                . " WHERE id = ".$procedimento->getId();
        Conexao::executar($sql);
        
    }
    
    public static function excluir( $idProcedimento ){
        $sql =    "DELETE FROM procedimentos "
                . " WHERE id = ".$idProcedimento;
        Conexao::executar($sql);
        
    }
    
    public static function getProcedimentos(){
        $sql = "SELECT id, nome, valor FROM procedimentos ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_id, $_nome, $_valor) = mysqli_fetch_row($result) ){
                $procedimento = new Procedimento();
                $procedimento->setId($_id);
                $procedimento->setNome($_nome);
                $procedimento->setValor($_valor);
                $lista->append($procedimento);
            }
        }
        return $lista;
    }
    public static function getProcedimentoById( $id ){
        $sql = " SELECT p.id, p.nome, p.valor"
             . " FROM procedimentos p "
             . " WHERE p.id = ".$id 
             . " ORDER BY p.nome ";
        $result = Conexao::consultar($sql);
        list($_id, $_nome, $_valor) = mysqli_fetch_row($result);{
                $procedimento = new Procedimento();
                $procedimento->setId($_id);
                $procedimento->setNome($_nome);
                $procedimento->setValor($_valor);
        }        
        return $procedimento;
    }
}
