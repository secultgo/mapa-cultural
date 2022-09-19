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
<<<<<<< HEAD
    <?php if($evaluationAgent): ?>
        <label class="textarea-label">
            <?php i::_e('Justificativa de recurso') ?><br>
            <textarea name="data[obs]">{{$entity->justificationResource}}</textarea>
        </label>
    <?php elseif(!$evaluationAgent): ?>
        <span ng-if="<?php echo $entity->justificationResource !== null; ?>"><b>Justificativa de avaliação: </b><?php echo $entity->justificationResource; ?></span>
        <span ng-if="<?php echo $entity->justificationResource === null; ?>"><i>* Aguardando avaliação de recurso</i></span>
    <?php endif; ?>
    
=======
    
    <!-- Permite a edição da justificativa de recurso para avaliadores e administradores -->
    <?php if($evaluationAgent || $app->user->is('admin')): ?>
        <form name="resourceForm" ng-submit="saveJustification()" ng-controller="OpportunityController">   
            <label class="textarea-label">
                <?php \MapasCulturais\i::_e('Situação:') ?><br>
                <select name="status" required="required">
                    <option value=""><?php \MapasCulturais\i::_e('Selecione') ?></option>
                    <option ng-repeat="status in data.resourceStatuses" value="{{status.value}}" 
                        ng-selected="{{<?php echo (!is_null($entity->statusResource) ? $entity->statusResource : '-1') ?> === status.value}}">
                        {{status.label}}
                    </option>
                </select>          
            </label>
            <br/>
            <label class="textarea-label">
                <?php \MapasCulturais\i::_e('Justificativa de avaliação:') ?><br>
                <textarea name="justification" style="width:100%" rows="6" required="required"><?php echo $entity->justificationResource ?></textarea>
            </label>
            <p>
                <button type="submit" class="btn btn-primary"><?php \MapasCulturais\i::_e("Salvar");?></button>
            </p>
        </form>
    <?php elseif(!$evaluationAgent): ?>
        <span ng-if="<?php echo $entity->statusResource !== null; ?>"><b>Situação: </b>{{getResourceStatusLabel(<?php echo  $entity->statusResource ?>)}}<br></span>
        <span ng-if="<?php echo $entity->justificationResource !== null; ?>"><b>Justificativa de avaliação: </b><?php echo $entity->justificationResource; ?></span>
        <span ng-if="<?php echo $entity->justificationResource === null; ?>"><i>* Aguardando avaliação de recurso</i></span>
    <?php endif; ?>

>>>>>>> a9c2556c060e41e2e4c6ca8cf2966eaf11d9361d
    <?php $this->applyTemplateHook('registration-resource-field-list', 'after') ?>

</div>
