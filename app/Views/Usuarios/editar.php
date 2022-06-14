<?php
$this->extend('Layout/principal') ?>

<?php $this->section('titulo') ?>

<?php echo $titulo; ?>

<?php $this->endSection() ?>


<?php $this->section('estilos') ?>

<?php $this->endSection() ?>

<?php $this->section('conteudo') ?>

<div class="row">

    <div class="col-lg-6">

        <div class="block">

            <div class="block-body">

                <!-- Exibirá os retornos do back-end -->
                <div id="response">

                </div>

                <?php echo form_open('/', ['id' => 'form'], ['id' => "$usuario->id"]) ?>

                <!-- Formulário de edição -->
                <?php echo $this->include('Usuarios/_form'); ?>


                <div class="form-group mt-5 mb-2">


                    <input id="btn-salvar" type="submit" value="Salvar" class="btn btn-success btn-sm mr-2">

                    <a href="<?php echo site_url("usuarios/exibir/$usuario->id") ?>" class="btn btn-warning btn-sm ml-2">Voltar</a>
                </div>

                <?php echo form_close(); ?>

            </div><!-- block body -->

        </div>
        <!--FIM block -->

    </div>

</div>

<?php $this->endSection() ?>


<?php $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        $(document).ready(function() {
            $("#form").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('usuarios/atualizar'); ?>',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#response").html('');
                        $("#btn-salvar").val('Por favor aguarde ...');
                    },
                    
                });
            });
        });

    });
</script>



<?php $this->endSection() ?>