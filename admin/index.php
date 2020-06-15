<html>
    <head>
        <?php
        include_once '_head.php';
        ?>
    </head>
    <?php
    include_once '_combo_fixa_tipo.php';
    ?>
    <div id="divNomeFunc" style="display: none">

        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" placeholder="Digite o seu nome" id="nome" />
            <label id="val_nome" class="Validar"></label>
        </div>

    </div>

    <div id="divGeral" style="display: none">
        <div class="form-group">
            <label>Escolha o setor</label>
            <select class="form-control" id="setor">
                <option value="">Selecione</option>
            </select>
            <label id="val_setor" class="Validar"></label>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input class="form-control" placeholder="Digite o seu email" id="email"/>
            <label id="val_email" class="Validar"></label>
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input class="form-control" placeholder="Digite o seu telefone" id="telefone"/>
            <label id="val_telefone" class="Validar"></label>
        </div>
        <div class="form-group">
            <label>Endereço</label>
            <input class="form-control" placeholder="Digite o endereço"  id="endereco"/>
            <label id="val_endereco" class="Validar"></label>
        </div>

    </div>
    <center><button type="submit" class="btn btn-success">Salvar</button></center>  



</html>