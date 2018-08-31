<div id="main" style="height: 3200px;">
    <div class="w3-display-container2 w3-opacity-min inicio2 w3-white">
        <div class="w3-bar-block fundoEmpresas"></div>
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-large w3-black w3-jumbo w3-wide w3-animate-opacity">
                <?php if($this->session->userdata("usuario_logado")): ?>SUA EMPRESA
                <?php else: ?>EMPRESAS
                <?php endif?></span>
        </div>
    </div>

    <?php if($this->session->flashdata("succes")):?>
        <p class="alert alert-success msg-success" style="position: fixed;margin-top: -113px;"> <?= $this->session->flashdata("succes")?></p>
        <script>
            setTimeout(function(){
                var msg = document.getElementsByClassName("msg-success");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 4000);
        </script>
    <?php endif ?>

    <?php if($this->session->flashdata("danger")):?>
        <p class="alert alert-danger msg-danger" style="position: fixed;margin-top: -113px;" > <?= $this->session->flashdata("danger")?></p>
        <script>
            setTimeout(function(){
                var msg = document.getElementsByClassName("msg-danger");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
                $("msg-danger").onload(function(){
                    $("p").fadeOut();
                });
            }, 4000);

        </script>
    <?php endif ?>


    <!-- USUARIO LOGADO -->

    <?php if($this->session->userdata("usuario_logado")):
    ?>
        <?=
        anchor("login/logout", "Sair", array("class"=>"btn btn-lg", "style"=>"height:100px;
        font-size: 50px;
        background-color: #464646;
        color: #fff;
        border-color: #464646;
        width: 30%;
        margin-left: 70%;"));
        ?><!-- botao sair -->

        <?php $usuario = $this->session->userdata("usuario_logado"); ?>
        <br/>
        <br/>
        <header  class="aboutEmpresas">
            <h1 > - <?= strtoupper($usuario['nome'])?> -</h1>
        </header>
        <table class="table">
            <tr>
                <td><h3>Telefone</h3></td>
                <td><h3><??></h3></td>
            </tr>
            <tr>
                <td><h3>Email</h3></td>
                <td><h3><?= $usuario['email']?></h3></td>
            </tr>
            <tr>
                <td><h3>Descrição</h3></td>
                <td><h3><?= $usuario['descrição']?></h3></td>
            </tr>
        </table>
        <br/>
        <br/>
        <br/>
        <header  class="aboutEmpresas">
            <h1 >Vagas</h1>
        </header>


        <?= anchor("pages/criarVagas", "Novo", array("class"=>"btn btn-lg btn-block", "style"=>"height:100px;
        font-size: 50px;
        background-color: #464646;
        color: #fff;
        border-color: #464646;
        width: 50%;
        margin-left: 25%;"));
        ?><!-- botao nova vaga -->

    <div>
        <?php foreach($vagas as $vaga):?>
            <>

        <?php endforeach;?>
    </div>






    <!-- USUARIO NÃO LOGADO -->

    <?php else: ?>

        <?php
        echo form_open("login/autenticar");
        ?>
        <div style="margin-bottom: 100px;">
            <div id="forms">
                <header class="aboutEmpresas">
                    <h1 >LOGIN</h1>
                </header>
                <?php
                echo form_input(array(
                    "name" => 'email',
                    "id" => 'email',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Email'
                ));
                ?><br/>
                <?php
                echo form_input(array(
                    "name" => 'senha',
                    "id" => 'senha',
                    "class" => 'w3-input w3-border-input w3-light-grey',
                    "maxlenght" =>'255',
                    "placeholder" => 'Crie uma senha'
                ));
                ?> <br/>
                <?php
                echo form_button(array(
                    "class" => 'w3-btn logar w3-red w3-hover-new2 w3-card w3-center',
                    "type" => 'submit',
                    "content" => 'Logar'
                )); ?>
            </div>
        </div>
        <?php
        echo form_close();
        ?>



        <?php
        echo form_open("usuarios/novo");
        ?>
        <div id="forms2" style="height=1%">
            <div class="cadastroEmpresa">
                <header class="aboutEmpresas">
                    <h1 class="w3-center" style="float=left" onclick="cadastro('cadastro')">CADASTRE-SE</h1>
                </header>
                <div id="cadastro" class=" w3-animate-left">
                    <br/><br/>
                    <h1 class="titulosForm" >LOGIN</h1>
                    <?php
                    echo form_input(array(
                        "name" => 'nome',
                        "id" => 'nome',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Nome'
                    ));
                    ?>
                    <br/>
                    <?php
                    echo form_input(array(
                        "name" => 'senhaC',
                        "id" => 'senhaC',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Crie uma senha'
                    ));
                    ?>
                    <br/><br/><br/>
                    <h1 class="titulosForm" >CONTATO</h1>
                    <?php
                    echo form_input(array(
                        "name" => 'emailC',
                        "id" => 'emailC',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Email'
                    ));
                    ?>
                    <br/>
                    <?php
                    echo form_input(array(
                        "name" => 'ddd',
                        "id" => 'ddd',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'5',
                        "placeholder" => 'DDD'
                    ));
                    ?>
                    <br/>
                    <?php
                    echo form_input(array(
                        "name" => 'telefone',
                        "id" => 'telefone',
                        "class" => 'w3-input w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Telefone'
                    ));
                    ?>
                    <br/><br/><br/>
                    <h1 class="titulosForm" >ENDEREÇO</h1>
                    <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Cidade" ><br/>
                    <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Bairro" ><br/>
                    <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Tipo do Logradouro"><br/> <!-- drop -->
                    <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Nome do Logradouro" ><br/>
                    <input class="w3-input w3-border-input w3-light-grey" type="text" placeholder="Número"><br/>
                    <br/><br/>
                    <h1 class="titulosForm" >DESCRIÇÃO DA EMPRESA</h1>
                    <?php
                    echo form_textarea(array(
                        "name" => 'descricao',
                        "id" => 'descricao',
                        "class" => 'w3-input-descricao w3-border-input w3-light-grey',
                        "maxlenght" =>'255',
                        "placeholder" => 'Fale um pouco sobre sua Empresa!'
                    ));
                    ?>
                    <br/><br/><br/><br/>
                    <?php
                    echo form_button(array(
                        "class" => 'w3-btn logar w3-red w3-hover-new2 w3-card w3-cente',
                        "type" => 'submit',
                        "content" => 'Cadastrar'
                    )); ?>
                </div>
            </div>
        </div>
        <?php
        echo form_close();
        ?>

    <?php endif?>

</div>