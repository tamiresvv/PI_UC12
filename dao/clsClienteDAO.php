<?php


class ClienteDAO {
    
    public static function inserir($cliente){
        $sql = "INSERT INTO clientes "
                . " ( nome, telefone, cpf, email, senha, "
                . "   foto, codCidade, sexo, tipo ) VALUES "
                . " ( '".$cliente->getNome()."' , "
                . "   '".$cliente->getTelefone()."' , "
                . "   '".$cliente->getCpf()."' , "
                . "   '".$cliente->getEmail()."' , "
                . "   '".$cliente->getSenha()."' , "
                . "   '".$cliente->getFoto()."' , "
                . "    ".$cliente->getCidade()->getId()." , "
                . "   '".$cliente->getSexo()."' , "
                . "   '".$cliente->getTipo()."' "
                . "  ); ";
//        echo $sql;
        
        Conexao::executar( $sql );
    }
    
    public static function editar($cliente){
        $sql = "UPDATE clientes SET " 
                . " nome =     '".$cliente->getNome()."' , "
                . " telefone = '".$cliente->getTelefone()."' , "
                . " cpf =      '".$cliente->getCpf()."' , "
                . " email =    '".$cliente->getEmail()."' , "
                . " foto  =    '".$cliente->getFoto()."' , "
                . " codCidade = ".$cliente->getCidade()->getId()." , "
                . " sexo =     '".$cliente->getSexo()."' , "
                . " tipo =     '".$cliente->getTipo()."'   "
                . " WHERE id =  ".$cliente->getId();
        
        Conexao::executar( $sql );
    }
    
    
    public static function excluir($cliente){
        $sql = "DELETE FROM clientes "
             . " WHERE id =  ".$cliente->getId();
        
        Conexao::executar( $sql );
    }
    
    public static function getClientes(){
        $sql = " SELECT c.id, c.nome, c.telefone, c.cpf,"
             . " c.email, c.foto, d.id, d.nome, c.sexo, c.tipo"
             . " FROM clientes c "
             . " INNER JOIN cidades d "
             . " ON c.codCidade = d.id "
             . " WHERE c.tipo = 'c' "
             . " ORDER BY c.nome ";
//        
//     echo $sql;
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod, $nome, $fone, $cpf, $mail,
            $foto, $codCid, $nomeCid, $sexo, $tipo) = mysqli_fetch_row($result) ){
            
            $cidade = new Cidade();
            $cidade->setId( $codCid );
            $cidade->setNome( $nomeCid );
            
            $cliente = new Cliente();
            $cliente->setId($cod);
            $cliente->setNome($nome);
            $cliente->setTelefone($fone);
            $cliente->setEmail($mail);
            $cliente->setCpf($cpf);
            $cliente->setFoto($foto);
            $cliente->setCidade($cidade);
            $cliente->setSexo($sexo);
            $cliente->setTipo($tipo);
  
            $lista->append($cliente);
        }
        
        return $lista;
    }
    
    
    public static function getMedicos(){
        $sql = " SELECT c.id, c.nome, c.telefone, c.cpf,"
             . " c.email, c.foto, d.id, d.nome, c.sexo, c.tipo"
             . " FROM clientes c "
             . " INNER JOIN cidades d "
             . " ON c.codCidade = d.id "
             . " WHERE c.tipo = 'm' "
             . " ORDER BY c.nome ";
            
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod, $nome, $fone, $cpf, $mail,
            $foto, $codCid, $nomeCid, $sexo, $tipo) = mysqli_fetch_row($result) ){
            $cidade = new Cidade();
            $cidade->setId( $codCid );
            $cidade->setNome( $nomeCid );
            
            $cliente = new Cliente();
            $cliente->setId($cod);
            $cliente->setNome($nome);
            $cliente->setTelefone($fone);
            $cliente->setEmail($mail);
            $cliente->setCpf($cpf);
            $cliente->setFoto($foto);
            $cliente->setCidade($cidade);
            $cliente->setSexo($sexo);
            $cliente->setTipo($tipo);
  
            $lista->append($cliente);
        }
        
        return $lista;
    }
    
   public static function getClienteById( $id ){
        $sql = " SELECT c.id, c.nome, c.telefone, c.cpf,"
             . " c.email, c.foto, d.id, d.nome, c.sexo, c.tipo"
             . " FROM clientes c "
             . " INNER JOIN cidades d "
             . " ON c.codCidade = d.id "
             . " WHERE c.id = ".$id 
             . " ORDER BY c.nome ";
        
        $result = Conexao::consultar($sql);
      
        list( $cod, $nome, $fone, $cpf, $mail,
            $foto, $codCid, $nomeCid, $sexo, $tipo) = mysqli_fetch_row($result);
            $cidade = new Cidade();
            $cidade->setId( $codCid );
            $cidade->setNome( $nomeCid );
            $cliente = new Cliente();
            $cliente->setId($cod);
            $cliente->setNome($nome);
            $cliente->setTelefone($fone);
            $cliente->setEmail($mail);
            $cliente->setCpf($cpf);
            $cliente->setFoto($foto);
            $cliente->setCidade($cidade);
            $cliente->setSexo($sexo);
            $cliente->setTipo($tipo);
  
            
        return $cliente;
    }
  
    public static function logar($login, $senha){
        $sql = " SELECT id, nome, foto, tipo "
             . " FROM clientes "
             . " WHERE ( email = '".$login."' OR "
             . "           CPF = '".$login."' )  "
             . "     AND senha = '".$senha."'    ";
        $result = Conexao::consultar($sql);
        
        if( mysqli_num_rows( $result ) > 0 ){
            $dados = mysqli_fetch_assoc( $result );
            $cliente = new Cliente();
            $cliente->setId( $dados['id'] );
            $cliente->setNome( $dados['nome'] );
            $cliente->setFoto( $dados['foto'] );
            $cliente->setTipo( $dados['tipo'] );
            return $cliente;
        } else {
            return NULL;
        }
        
    }
   
    
}
