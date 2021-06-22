<div class="categorias-container">
    <div style="display:flex; align-items: center; justify-content: center; margin-bottom: 20px">
            <h1 style="margin: 0">Lista de Categorias</h1>
            <button id="addCategoria" style="width: fit-content; align-self: center; border-radius: 50%; margin-left: 10px;">+</button>
    </div>
    <?php
    if (count($data) == 0) {
        echo "<p style='text-align: center'>Nenhuma categoria cadastrada.</p>";
    }
    foreach($data as $categoria){
    ?>
        <div class="card-categorias">
            <?= $categoria->descricao ?>
            <div>
                <img onclick="editarCategoria(<?= $categoria->id ?>)" src="../../../public/imgs/edit.svg" />
                <img onclick="deletarCategoria(<?= $categoria->id ?>)" src="https://icons.veryicon.com/png/o/construction-tools/coca-design/delete-189.png" />
            </div>
        </div>
    <?php
    }
    ?>
    <form id="form-deletar" method="POST" action="./acoes.php">
        <input type="hidden" name="acao" value="deletar" />
        <input type="hidden" id="categoriaId" name="categoriaId" value="" />
    </form>
<script>
    function deletarCategoria(categoriaId){
        if(confirm("Deseja realmente deletar esta categoria?"))
            window.location = `/categorias/destroy/${categoriaId}`;
    }


    function editarCategoria(categoriaId){
        window.location = `/categorias/edit/${categoriaId}`;
    }
    
    document.querySelector("#addCategoria").addEventListener("click", () => {
        window.location = "/categorias/create";
    })
</script>
</div>