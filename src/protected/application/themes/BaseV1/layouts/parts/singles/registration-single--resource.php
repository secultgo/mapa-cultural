<div ng-if="<?php echo $entity->requestedResource !== null; ?>" id="registration-resource" class="registration-fieldset">
    
    <h4><?php \MapasCulturais\i::_e("Solicitação de recurso");?></h4>
    
    <?php $this->applyTemplateHook('registration-resource-field-list', 'before') ?>
    <b>Solicitação pelo proponente: </b><?php echo $entity->requestedResource; ?>
    <p><b>Data da solicitação: </b><?php echo $entity->requestedResourceTimestamp ? $entity->requestedResourceTimestamp->format(\MapasCulturais\i::__('d/m/Y à\s H:i')): '';?></p>
    <?php
        $evaluationAgent = false;
        foreach ($entity->opportunity->getEvaluationCommittee() as $evaluation_user) {
            if($evaluation_user->agent === \MapasCulturais\App::i()->user->profile)
                $evaluationAgent = true;
        }
    ?>
    <?php if($evaluationAgent): ?>
        <label class="textarea-label">
            <?php i::_e('Justificativa de recurso') ?><br>
            <textarea name="data[obs]">{{$entity->justificationResource}}</textarea>
        </label>
    <?php elseif(!$evaluationAgent): ?>
        <span ng-if="<?php echo $entity->justificationResource !== null; ?>"><b>Justificativa de avaliação: </b><?php echo $entity->justificationResource; ?></span>
        <span ng-if="<?php echo $entity->justificationResource === null; ?>"><i>* Aguardando avaliação de recurso</i></span>
    <?php endif; ?>
    
    <?php $this->applyTemplateHook('registration-resource-field-list', 'after') ?>

</div>
