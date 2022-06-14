<?php
$this->extend('Layout/principal') ?>

<?php echo $this->section('titulo') ?>

<?php echo $titulo; ?>

<?php echo $this->endSection() ?>


<?php echo $this->section('estilos') ?>

<?php echo $this->endSection() ?>

<?php echo $this->section('conteudo') ?>

<!-- Row -->
<div class="row">
    <!-- Coluna -->
    <div class="col-lg-6">
        <!-- Block -->
        <div class="block">
            <!-- Block-body -->
            <div class="block-body">

                <!-- Exibirá os retornos do back-end -->
                <div id="response">

                </div>
                <!-- Fim Response -->

                <?php echo form_open('/', ['id' => 'form'], ['id' => "$usuario->id"]) ?>

                <!-- Formulário de edição -->
                <?php echo $this->include('Usuarios/_form'); ?>

                <!-- Form -->
                <div class="form-group mt-5 mb-2">


                    <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-success btn-sm mr-2">

                    <a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-warning btn-sm ml-2">Voltar</a>
                </div>
                <!-- Fim Form -->

                <?php echo form_close(); ?>

            </div><!-- block body -->

        </div>
        <!--FIM block -->

    </div>
    <!-- Fim Coluna -->

</div>
<!--Fim Row -->

<?php echo $this->endSection() ?>


<?php echo $this->section('scripts') ?>

<!--Ajax -->

<script>
    $(document).ready(function(){

        $("#form").on('submit', function(e){

            alert('Chegou ate aqui')

        });

    });
</script>


<!--Ajax -->
    
<?php echo $this->endSection() ?>

