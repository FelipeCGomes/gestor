<?php $this->extend('Layout/principal') ?>

<?php $this->section('titulo') ?>

<?php echo $titulo; ?>

<?php $this->endSection() ?>


<?php $this->section('estilos') ?>

<?php $this->endSection() ?>

<?php $this->section('conteudo') ?>

<div class="row">

    <div class="col-lg-4">
        <div class="block">

            <div class="text-center">
                <?php if ($usuario->imagem == null) : ?>
                    <!-- Se não tem imagem -->
                    <img src="<?php echo site_url('recursos/img/usuario_sem_imagem.png') ?>" class="card-img-top" alt="imagem_perfil" style="width:80%" ;>


                <?php else : ?>
                    <!-- Se tem IMAGEM -->
                    <img src="<?php echo site_url("usuarios/imagem/$usuario->imagem") ?>" class="card-img-top" alt="<?php echo esc($usuario->nome) ?>" style="width:90%" ;>
                <?php endif; ?>


                <a href="<?php echo site_url("usuarios/editarimagem/$usuario->id"); ?>" class="btn btn-outline-success btn-sm mt-3">Alterar Imagem</a>

            </div>

            <hr class="border-secondary">
            <h5 class="card-title mt-2"> Nome: <?php echo esc($usuario->nome); ?> </h5>
            <p class="card-text">E-mail: <?php echo esc($usuario->email); ?></p>
            <p class="card-text">Criação: <?php echo $usuario->criado_em->humanize(); ?></p>
            <p class="card-text">Atualização: <?php echo $usuario->atualizado_em->humanize(); ?></p>
            

            <!-- Example single danger button -->
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Ações
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url("usuarios/editar/$usuario->id") ?>">Editar</a>
                    <div class="dropdown-divider">Excluir</div>
                </div>
            </div>

            <a href="<?php echo site_url("usuarios") ?>" class="btn btn-warning ml-2">Voltar</a>


        </div>

    </div>

</div>

<?php $this->endSection() ?>

<?php $this->section('scripts') ?>

<?php $this->endSection() ?>