<?php
// CONFIGURAÇÃO DE IMAGEM BACKGROUND
$bgUrl="style='
    background-image: url(".$this->asset('img/bgDevelopers.jpg', false).");
    background-size: cover;
    background-blend-mode: multiply;
'"
?>
<article id="home-developers" class="js-page-menu-item home-entity clearfix" <?=$bgUrl ?>>
    <?php $this->applyTemplateHook('home-developers','begin'); ?>
    <div class="box">
        <h1><span class="icon icon-developers"></span> <?php \MapasCulturais\i::_e("Desenvolvedores");?></h1>
        <p><?php echo $app->view->renderMarkdown($this->dict('home: home_devs',false)); ?> </p>
    </div>
    <?php $this->applyTemplateHook('home-developers','end'); ?>
</article>