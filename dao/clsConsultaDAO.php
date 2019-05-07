<?php


class ConsultaDAO {
    public static function inserir( $consulta ){
        $sql = " INSERT INTO consultas "
             . " (codCliente, codMedico, valor, data, codHorario, codProcedimento) "
             . " VALUES ( "
             . $consulta->getCliente()->getId()      . " , "
             . $consulta->getMedico()->getId()       . " , "
             . $consulta->getValor()                 . " , "
             . " '". $consulta->getData()            . "'  , "
             . $consulta->getHorario()->getId()      . " ,"
             . $consulta->getProcedimento()->getId()." ) ";
        
     echo $sql;
        Conexao::executar($sql);
    }
    
    public static function editar($consulta){
        $sql = "UPDATE consultas SET " 
                . " cliente =        '".$consulta->getCliente()->getId()."' , "
                . " cliente =        '".$consulta->getMedico()->getId()."' , "
                . " valor =          '".$consulta->getValor()."' , "
                . " horario =        '".$consulta->getHorario()
                . " procedimento =   '".$consulta->getProcedimento()
                . " data =           '".$consulta->getData()
                . " WHERE id =        ".$consulta->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function excluir( $idConsulta ){
        $sql =    "DELETE FROM consultas "
                . " WHERE id = ".$idConsulta;
        Conexao::executar($sql);
        
    }
    
    public static function getConsultas(){
//        $sql = " SELECT c.id, DATE_FORMAT(c.data, '%d/%m/%Y'), c.valor, p.id, p.nome, m.id, m.nome, h.id, h.hora, e.id, e.nome, e.valor "
        $sql = " SELECT c.id, c.data, c.valor, p.id, p.nome, m.id, m.nome, h.id, h.hora, e.id, e.nome, e.valor "
             . " FROM consultas c "
             . " INNER JOIN clientes p ON p.id = c.codCliente "
             . " INNER JOIN clientes m ON m.id = c.codMedico  "
             . " INNER JOIN horarios h ON h.id = c.codHorario  "
             . " INNER JOIN procedimentos e ON e.id = c.codProcedimento "
             . " ORDER BY c.data DESC ";

        
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $codConsulta, $data, $valor, $idPac, $nomePac, $idMed, $nomeMed, $idHorario, $nomeHorario, $idProcedimento, $nomeProcedimento, $valorProcedimento ) = mysqli_fetch_row($result) ){
            $paciente = new Cliente();
            $paciente->setId($idPac);
            $paciente->setNome($nomePac);
            
            $medico = new Cliente();
            $medico->setId($idMed);
            $medico->setNome($nomeMed);
            $horario = new Horario();
            $horario->setId($idHorario);
            $horario->setHora($nomeHorario);
            
            $procedimento = new Procedimento();
            $procedimento->setId($idProcedimento);
            $procedimento->setNome($nomeProcedimento);
            $procedimento->setValor($valorProcedimento);
            
            $consulta = new Consulta();
            $consulta->setId($codConsulta);
            $consulta->setValor($valor);
            $consulta->setData($data);
            $consulta->setHorario($horario);
            $consulta->setProcedimento($procedimento);
            $consulta->setCliente($paciente);
            $consulta->setMedico($medico);
  
            $lista->append($consulta);
        }
        
        return $lista;
    }
     public static function getConsultaById($id){
//        $sql = " SELECT c.id, DATE_FORMAT(c.data, '%d/%m/%Y'), c.valor, p.id, p.nome, m.id, m.nome, h.id, h.hora, e.id, e.nome, e.valor "
        $sql = " SELECT c.id, c.data, c.valor, p.id, p.nome, m.id, m.nome, h.id, h.hora, e.id, e.nome, e.valor "
             . " FROM consultas c "
             . " INNER JOIN clientes p ON p.id = c.codCliente "
             . " INNER JOIN clientes m ON m.id = c.codMedico  "
             . " INNER JOIN horarios h ON h.id = c.codHorario  "
             . " INNER JOIN procedimentos e ON e.id = c.codProcedimento "
             . " WHERE c.id = ".$id 
             . " ORDER BY c.data DESC ";



        
        $result = Conexao::consultar($sql);
        list( $codConsulta, $data, $valor, $idPac, $nomePac, $idMed, $nomeMed, $idHorario, $nomeHorario, $idProcedimento, $nomeProcedimento, $valorProcedimento ) = mysqli_fetch_row($result) ;
            $paciente = new Cliente();
            $paciente->setId($idPac);
            $paciente->setNome($nomePac);
            
            $medico = new Cliente();
            $medico->setId($idMed);
            $medico->setNome($nomeMed);
            
            $horario = new Horario();
            $horario->setId($idHorario);
            $horario->setHora($nomeHorario);
            
            $procedimento = new Procedimento();
            $procedimento->setId($idProcedimento);
            $procedimento->setNome($nomeProcedimento);
            $procedimento->setValor($valorProcedimento);
            
            $consulta = new Consulta();
            $consulta->setId($codConsulta);
            $consulta->setValor($valor);
            $consulta->setData($data);
            $consulta->setHorario($horario);
            $consulta->setProcedimento($procedimento);
            $consulta->setCliente($paciente);
            $consulta->setMedico($medico);
  
            
        
        
        return $consulta;
    }   
  }
    
    
   