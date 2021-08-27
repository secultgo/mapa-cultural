<div ng-if="<?php echo sizeof($entity->getUserEvaluations()) > 0; ?>" id="registration-evaluations" class="registration-fieldset">
    
    <h4><?php \MapasCulturais\i::_e("Avaliações");?></h4>

    <?php
        $reg_args = ['registration' => $entity, 'opportunity' => $opportunity]; 
    ?>
    
    <?php $this->applyTemplateHook('registration-evaluations-field-list', 'before', $reg_args) ?>
    <?php echo $entity->getUserEvaluationsString(); ?>
    <?php $this->applyTemplateHook('registration-evaluations-field-list', 'after', $reg_args) ?>
    
</div>
