<?php

        function conectarBanco(){
            // string de conexão com o banco de dados
            $conexao = new PDO("mysql:host=localhost:3306; dbname=bancophp", 
            "root", ""); 
            return $conexao;
        }

        function retornarProdutos(){
            try {
                $sql = "SELECT p.*, c.descricao as categoria FROM produto p INNER JOIN categoria c ON c.id = p.categoria_id";
                $conexao = conectarBanco();
                return $conexao->query($sql); // objeto.metodo em php usa-se a flechinha objeto->metodo
            } catch (Exception $e) {
                return 0;
            }
        }

        function inserirProduto($nome, $descricao, $valor, $categoria){
            try {
                $sql = "INSERT INTO produto (nome, descricao, valor, categoria_id)
                VALUES (:nome, :descricao, :valor, :categoria)"; // atribuindo apelidos às variáveis por segurança, para evitar injeção de SQL
                $conexao = conectarBanco();
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":nome", $nome); // bindValue troca nomes dos apelidos das variáveis e atribuem valores
                $stmt->bindValue(":descricao", $descricao);
                $stmt->bindValue(":valor", $valor);
                $stmt->bindValue(":categoria", $categoria);
                return $stmt->execute();

            } catch (Exception $e) {
                return 0;
            } # finally { } - finalizar a conexão com o banco de dados é opcional
        }

        function retornarCategorias(){
            try {
                $sql = "SELECT * FROM categoria";
                $conexao = conectarBanco();
                return $conexao->query($sql); // objeto.metodo em php usa-se a flechinha objeto->metodo
            } catch (Exception $e) {
                return 0;
            }
        }

        function consultarProdutoId($id){
            try{
                $sql = "SELECT * FROM produto WHERE id = :id";
                $conexao = conectarBanco();
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                return $stmt->fetch();

            } catch (Exception $e){
                return 0;
            }
        }

        function alterarProduto($nome, $descricao, $valor, $categoria, $id){
            try {
                $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, valor = :valor, categoria_id = :categoria 
                    WHERE id = :id"; // atribuindo apelidos às variáveis por segurança, para evitar injeção de SQL
                $conexao = conectarBanco();
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":nome", $nome); // bindValue troca nomes dos apelidos das variáveis e atribuem valores
                $stmt->bindValue(":descricao", $descricao);
                $stmt->bindValue(":valor", $valor);
                $stmt->bindValue(":categoria", $categoria);
                $stmt->bindValue(":id", $id);
                return $stmt->execute();

            } catch (Exception $e) {
                return 0;
            } # finally { } - finalizar a conexão com o banco de dados é opcional
        }

        function excluirProduto($id){
            try {
                $sql = "DELETE FROM produto WHERE id = :id"; // atribuindo apelidos às variáveis por segurança, para evitar injeção de SQL
                $conexao = conectarBanco();
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(":id", $id);
                return $stmt->execute();

            } catch (Exception $e) {
                return 0;
            } # finally { } - finalizar a conexão com o banco de dados é opcional
        }