
<div class="categorias-container">
<form class="form-categoria" method="POST" action="/categorias/store/update/<?=$data->id?> ">
                    <h1 class="span2">Editar Categorias</h1>
                    <ul>
                        <?php
                        //verifica se existe erros na sessão do usuário
                        if (isset($_SESSION["erros"])) {
                            //se existir percorre os erros exbindo na tela
                            foreach ($_SESSION["erros"] as $erro) {
                        ?>
                                <li><?= $erro ?></li>
                        <?php
                            }
                            //eliminar da sessão os erros já mostrados
                            unset($_SESSION["erros"]);
                        }
                        ?>
                    </ul>
                    <div class="input-group span2">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" value="<?=$data ->descricao?>"/>
                    </div>
                    <button type="button" onclick="javascript:window.location.href = '/categorias'">Cancelar</button>
                    <button>Salvar</button>
                </form>
    

</div>



