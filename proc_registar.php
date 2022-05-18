<?php
    session_start();
    ob_start();
    include('./conexao/conexao.php');

    if(isset($_POST['btn_registar'])) {
        //Inserir equpamento na base de dados
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];

        if(isset($_FILES['imagem']['name'])) {
            $imagem = $_FILES['imagem']['name'];
            $imagem_tmp = $_FILES['imagem']['tmp_name'];

            move_uploaded_file($imagem_tmp, "./imagens/".$imagem );
        }

        $query = "INSERT INTO clientes (nome, email, telefone, sexo) 
                    VALUES (:nome, :email, :telefone, :sexo, NOW())";
        $result = $conn->prepare($query);
        $result->bindParam(':nome', $nome);
        $result->bindParam(':email',  $email);
        $result->bindParam(':telefone',  $telefone);
        $result->bindParam(':sexo',  $sexo);
        $result->bindParam(':imagem', $imagem );

        $result->execute();

        if($result) {
            $_SESSION['registo'] = "sucesso";
            $_SESSION['mensagem_registo_clientes'] = "cliente registado com sucesso!";
            header('location: ./index.php');
        } else {
            $_SESSION['registo_cliente'] = "erro";
            $_SESSION['mensagem_registo_cliente'] = "Erro ao registar cliente!";
            header('location: ./registar.php');
        }
    } else {
        header('location: ./registar.php');
        

    }
    if(isset($_POST['btn_editar'])) {
        //Editar cliente na base de dados
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];

        if(isset($_FILES['imagem']['name'])) {
            $imagem = $_FILES['imagem']['name'];
            $imagem_tmp = $_FILES['imagem']['tmp_name'];

            move_uploaded_file($imagem_tmp, "./imagens/".$imagem);
        }

        $query = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone = :sexo, imagem = :imagem WHERE id = :id";
        $result = $conn->prepare($query);
        $result->bindParam(':id', $id);
        $result->bindParam(':nome', $nome);
        $result->bindParam(':email', $email);
        $result->bindParam(':telefone', $telefone);
        $result->bindParam(':sexo', $sexo);
        $result->bindParam(':imagem', $imagem);

        $result->execute();

        if($result) {
            $_SESSION['editar'] = "sucesso";
            header('location: ./index.php');
        } else {
            $_SESSION['editar'] = "erro";
            header('location: ./editar.php');
        }
    } else {
        header('location: ./editar.php');
    }

    if(isset($_POST['btn_excluir'])) {

        $id = $_POST['btn_excluir'];

        try {
            $query = "DELETE FROM clientes WHERE id = :id";
            $statement = $conn->prepare($query);
            $data = [
                ':id' => $id
            ];
            $query_execute = $statement->execute($data);

            if($query_execute) {
                $_SESSION['message'] = "sucesso";
                header('location: ./index.php');
                exit(0);
            } else {
                $_SESSION['message'] = "erro";
                header('location: ./index.php');
                exit(0);
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_POST['excluir_btn_set'])){
        $exc_id = $_POST['btn_excluir'];

        $query = "DELETE FROM clientes WHERE id = :btn_excluir";
        $statement = $conn->prepare($query);
    }
    

?>