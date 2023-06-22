<?php
// Lógica do PHP
use MapasCulturais\i;

// Importa JS
$this->enqueueScript('app', 'select-fields-export', 'js/export-csv-with-fields-selecteds/select-fields-export.js', []);
?>

<style>
    .title-fields-export {
        font-size: 0.75rem;
        line-height: 1.875rem;
        font-weight: bold;
    }

    .radio-fields-export {
        font-size: 0.75rem;
        line-height: 1.875rem;
    }
</style>

<script>
    statusRegistration = <?= json_encode($status); ?>;
    customFields = <?= json_encode($customFields); ?>;
</script>

<div id="select-fields-export">

    <?php if ($entity->registrationCategories != null && count($entity->registrationCategories) > 0) { ?>
        <div class="form-group">
            <label class="title-fields-export" >Categorias</label>

            <?php foreach ($entity->registrationCategories as $k => $category) { ?>
                <div class="radio">
                    <label class="radio-fields-export">
                        <input type="radio" name="categoriesExport" <?php if ($k == 0) { echo "checked"; } ?>>
                        <?= $category; ?>
                    </label>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="form-group">
        <label class="title-fields-export">Status</label>
        <div class="dropdown" style="width:100%; margin:10px 0px;">
            <div class="placeholder" ng-click="status_dropdown = ''"><?php i::_e("Selecione status de exportação:") ?>
                <div class="submenu-dropdown" style="background: #fff;">
                    <div class="filter-search" style="padding: 5px;">
                        <input type="text" ng-model="status_dropdown" style="width:100%;" placeholder="Busque pelos status das inscrições que deseja exportar" />
                    </div>
                    <ul class="filter-list">
                        <?php foreach ($status as $stat) { ?>
                            <li class="selected" id="status-registration-<?= $stat['value'] ?>" onclick="toggleFieldStatus(<?= $stat['value'] ?>)"><?= i::_e($stat['label']); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="title-fields-export">Campos:</label>
        <div class="dropdown" style="width:100%; margin:10px 0px;">
            <div class="placeholder" ng-click="filter_dropdown = ''"><?php i::_e("Selecione colunas de exportação:") ?></div>
                <div class="submenu-dropdown" style="background: #fff;">
                    <div class="filter-search" style="padding: 5px;">
                        <input type="text" ng-model="filter_dropdown" style="width:100%;" placeholder="Busque pelo nome dos campos para exportação e selecione as colunas" />
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
    </div>
    
    <div>
        <button class="btn btn-success" onclick="exportCsvSelectFields('<?= $app->createUrl('exportCsvWithFieldsSelecteds', 'report'); ?>', <?= $entity->id ?>)">
            Baixar CSV
        </button>
    </div>
</div>
