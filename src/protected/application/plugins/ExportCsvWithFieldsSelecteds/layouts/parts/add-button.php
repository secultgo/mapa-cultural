<?php 

// Importa os arquivos JS
$this->enqueueScript('app', '', 'js/export-csv-with-fields-selecteds/add-button.js');

// Lógica do PHP
use MapasCulturais\i;  
?>

<a class="btn btn-default download btn-export-cancel" onclick="toggleSelectFieldsExports()" rel="noopener noreferrer">
    <?php i::esc_attr_e('Baixar com Filtro') ?>
</a>
