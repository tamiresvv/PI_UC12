<?php


class HorarioDAO {
    
    public static function inserir( $horario ){
        $sql = "INSERT INTO horarios ( hora ) VALUES "
                . " ( '".$horario->getHora()."' ); ";
        Conexao::executar($sql);
        
    }
    
    public static function editar( $horario ){
        $sql =    "UPDATE horarios SET "
                . " nome = '".$horario->getHora()."' "
                . " WHERE id = ".$horario->getId();
        Conexao::executar($sql);
        
    }
    public static function excluir( $idHorario ){
        $sql =    "DELETE FROM horarios "
                . " WHERE id = ".$idHorario;
        Conexao::executar($sql);
        
    }
    
    public static function getHorarios(){
        $sql = "SELECT id, hora FROM horarios ORDER BY hora";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if( $result != NULL ){
            while( list($_id, $_hora) = mysqli_fetch_row($result) ){
                $horario = new Horario();
                $horario->setId($_id);
                $horario->setHora($_hora);
                $lista->append($horario);
            }
        }
        return $lista;
    }
    
    
}