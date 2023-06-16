<?php
// Lógica do PHP
use MapasCulturais\i;

// Importa JS
$this->enqueueScript('app', 'select-fields-export', 'js/export-csv-with-fields-selecteds/select-fields-export.js', []);
?>

<script>
    customFields = <?= json_encode($customFields); ?>;
</script>

<div id="select-fields-export">
    <div class="dropdown" style="width:100%; margin:10px 0px;">
        <div class="placeholder" ng-click="filter_dropdown = ''"><?php i::_e("Selecione colunas de exportação:") ?></div>
            <div class="submenu-dropdown" style="background: #fff;">
                <div class="filter-search" style="padding: 5px;">
                    <input type="text" ng-model="filter_dropdown" style="width:100%;" placeholder="Busque pelo nome dos campos do formulário de inscrição e selecione as colunas visíveis" />
                </div>
                <ul class="filter-list">
                    <?php foreach ($defaultFields as $field) { ?>
                        <li class="selected"><?= $field; ?></li>
                    <?php } ?>

                    <?php foreach ($customFields as $field) { ?>
                        <li id="list-custom-fields-<?= $field['id']; ?>" onclick="toggleFieldInList(<?= $field['id']; ?>);"
                            class="selected"><?= $field['title']; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="selected-filters" style="width:100%; margin:10px 0px;">
        <span>
            <?php foreach ($defaultFields as $field) { ?>
                <a class="tag-selected btn-info" rel='noopener noreferrer'><?= $field; ?></a>
            <?php } ?>
        </span>
        <span id="show-tags-custom-fields">
        <?php foreach ($customFields as $field) { ?>
            <a class="tag-selected btn-info" rel="noopener noreferrer" onclick="removeTagElementById(<?= $field['id']; ?>)"><?= $field['title']; ?></a>
            <?php } ?>
        </span>
    </div>
    <div>
        <button class="btn btn-success" onclick="exportCsvSelectFields('<?= $app->createUrl('exportCsvWithFieldsSelecteds', 'report'); ?>', <?= $entity->id ?>)">
            Baixar CSV
        </button>
    </div>
</div>
