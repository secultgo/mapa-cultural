<div ng-if="<?php echo sizeof($entity->getUserEvaluations()) > 0; ?>" id="registration-evaluations" class="registration-fieldset">
    
    <h4><?php \MapasCulturais\i::_e("Avaliações");?></h4>
    
    <?php $this->applyTemplateHook('registration-evaluations-field-list', 'before') ?>
    <?php echo $entity->getUserEvaluationsString(); ?>
    <?php $this->applyTemplateHook('registration-evaluations-field-list', 'after') ?>

    <?php if($entity->canUser('sendClaimMessage')): ?>
        <a href="<?php echo $opportunity->singleUrl ?>"><?php echo \MapasCulturais\i::_e("Ir para página da oportunidade para solicitar o recurso"); ?></a>
    <?php endif ?>

</div>
