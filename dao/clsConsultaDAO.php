<?php


class ConsultaDAO {
    public static function inserir( $consulta ){
        $sql = " INSERT INTO consultas "
             . " (codCliente, codMedico, valor, data, codHorario) "
             . " VALUES ( "
             . $consulta->getCliente()->getId()      . " , "
             . $consulta->getMedico()->getId()       . " , "
             . $consulta->getValor()                 . " , "
             . " '". $consulta->getData()            . "'  , "
             . $consulta->getHorario()->getId()      . "  ) ";
        
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
        $sql = " SELECT c.id, DATE_FORMAT(c.data, '%d/%m/%y'), c.valor, p.id, p.nome, m.id, m.nome "
             . " FROM consultas c "
             . " INNER JOIN clientes p ON p.id = c.codCliente "
             . " INNER JOIN clientes m ON m.id = c.codMedico  "
             . " INNER JOIN horarios h ON h.id = c.codHorario  "
             . " ORDER BY c.data DESC ";

        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $codHorario,  $data, $valor, $idPac, $nomePac, $idMed, $nomeMed ) = mysqli_fetch_row($result) ){
            $paciente = new Cliente();
            $paciente->setId($idPac);
            $paciente->setNome($nomePac);
            
            $medico = new Cliente();
            $medico->setId($idMed);
            $medico->setNome($nomeMed);
            
            $consulta = new Consulta();
            $consulta->setId($codHorario);
            $consulta->setValor($valor);
            $consulta->setData($data);
            $consulta->setHorario($horario);
            $consulta->setCliente($paciente);
            $consulta->setMedico($medico);
  
            $lista->append($consulta);
        }
        
        return $lista;
    }
        
    }
    
    
   