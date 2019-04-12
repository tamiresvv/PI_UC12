<?php


class ConsultaDAO {
    public static function inserir( $consulta ){
        $sql = " INSERT INTO consultas "
             . " (codCliente, codMedico, valor, horario) "
             . " VALUES ( "
             . $consulta->getCliente()->getId()      . " , "
             . $consulta->getMedico()->getId()       . " , "
             . $consulta->getValor()                 . " , "
             . $consulta->getData()                  . "  , "
             . $consulta->getHorario()               . "  ) ";
        
        Conexao::executar($sql);
    }
    
    public static function editar($consulta){
        $sql = "UPDATE consultas SET " 
                . " cliente =        '".$consulta->getCliente()->getId()."' , "
                . " cliente =        '".$consulta->getMedico()->getId()."' , "
                . " valor =          '".$consulta->getValor()."' , "
                . " horario =        '".$consulta->getHorario()
                . " data =           '".$consulta->getData()
                . " WHERE id =        ".$consulta->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function excluir($consulta){
        $sql = "DELETE FROM consultas "
             . " WHERE id =  ".$consulta->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function getConsultas(){
        $sql = " SELECT c.id, DATE_FORMAT(c.horario,'%d/%m/%Y %H:%i'), c.valor, p.id, p.nome, m.id, m.nome  "
             . " FROM consultas c "
             . " INNER JOIN clientes p ON p.id = c.codCliente "
             . " INNER JOIN clientes m ON m.id = c.codMedico  "
             . " ORDER BY c.horario DESC ";

        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod,  $horario, $valor, $idPac, $nomePac, $idMed, $nomeMed ) = mysqli_fetch_row($result) ){
            $paciente = new Cliente();
            $paciente->setId($idPac);
            $paciente->setNome($nomePac);
            
            $medico = new Cliente();
            $medico->setId($idMed);
            $medico->setNome($nomeMed);
            
            $consulta = new Consulta();
            $consulta->setId($cod);
            $consulta->setValor($valor);
            $consulta->setHorario($horario);
            $consulta->setCliente($paciente);
            $consulta->setMedico($medico);
  
            $lista->append($consulta);
        }
        
        return $lista;
    }
        
    }
    
    
   