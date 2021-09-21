<header id="header-recursos" class="clearfix">
    <h3><?php \MapasCulturais\i::_e("Inscrições que solicitaram recurso");?></h3>
</header>
<p style="text-align:right">
    <small><span>*</span><em> <?php \MapasCulturais\i::_e('Passe o mouse sobre a avaliação para visualizar a solicitação de recurso') ?></em></small>
</p>
<div id="filtro-inscritos">
    <span class="label"> <?php \MapasCulturais\i::_e("Filtrar recursos:");?> </span>
    <input type="text" ng-model="data.resourcesFilters" ng-change="filterResources()" placeholder="<?php \MapasCulturais\i::_e('Busque pelo número de inscrição ou nome do responsável') ?>" />
</div>
<table class="js-registration-list registrations-table" ng-class="{'no-options': data.entity.registrationCategories.length === 0, 'no-attachments': data.entity.registrationFileConfigurations.length === 0, 'registrations-results': data.entity.published}">
    <thead>
        <tr>
            <th class="registration-id-col">
                <?php \MapasCulturais\i::_e("Inscrição");?>
            </th>
            <th class="registration-id-col">
                <mc-select placeholder="<?php \MapasCulturais\i::esc_attr_e("Avaliador"); ?>" model="resourcesFilters['valuer:id']" data="data.evaluationCommittee"></mc-select>
            </th>
            <th ng-if="data.entity.registrationCategories" class="registration-option-col">
                <mc-select placeholder="<?php \MapasCulturais\i::esc_attr_e("Categoria"); ?>" model="resourcesFilters['registration:category']" data="data.registrationCategoriesToFilter"></mc-select>
            </th>
            
            <th class="registration-agents-col">
                <?php \MapasCulturais\i::_e("Agente Responsável");?>
            </th>
            <th class="registration-status-col">
                <mc-select placeholder="<?php \MapasCulturais\i::esc_attr_e("Status"); ?>" model="resourcesFilters['status']" data="data.evaluationStatuses"></mc-select>
            </th>
            <th class="registration-status-col">
                <?php \MapasCulturais\i::esc_attr_e("Avaliação"); ?>
            </th>  
            <th class="registration-status-col">
                <mc-select placeholder="<?php \MapasCulturais\i::esc_attr_e("Recurso"); ?>" model="resourcesFilters['resources']" data="data.resourceStatuses"></mc-select>
            </th>  
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan='10'>
                <span ng-if="data.resourcesAPIMetadata.count === 0"><?php \MapasCulturais\i::_e("Nenhum recurso solicitado.");?></span>
                <span ng-if="data.resourcesAPIMetadata.count === 1"><?php \MapasCulturais\i::_e("1 recurso encontrado.");?></span>
                <span ng-if="data.resources.length > 1">
                    {{data.resources.length}} <?php \MapasCulturais\i::_e("solicitações de recurso");?>
             </span>                
            </td>
        </tr>

        <tr ng-repeat="resource in data.resources" id="registration-{{resource.registration.id}}" ng-show="!resource.hidden"
            class="hltip" title="{{resource.registration.requestedResource}}">

            <td class="registration-id-col">
                <a href='{{resource.resource.singleUrl || resource.registration.singleUrl}}' rel='noopener noreferrer'>
                    <strong>{{resource.registration.number}}</strong>
                </a>
            </td>
            <td class="registration-id-col">{{resource.valuer.name}}</td>
            <td ng-if="data.entity.registrationCategories" class="registration-option-col">{{resource.registration.category}}</td>
            <td class="registration-agents-col">
                <p>
                    <span class="label"><?php \MapasCulturais\i::_e("Responsável");?></span><br />
                    <a href="{{resource.registration.owner.singleUrl}}" rel='noopener noreferrer'>{{resource.registration.owner.name}}</a>
                </p>
            </td>
            <td class="registration-status-col">
                {{getEvaluationStatusLabel(resource)}}
            </td>
            <td class="registration-status-col">
                {{getEvaluationResultString(resource)}}
            </td>
            <td class="registration-status-col">
                {{getResourceStatusLabel(resource)}}             
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan='{{numberOfEnabledColumns()}}' align="center">
                <div ng-if="data.findingResources">
                    <img src="<?php $this->asset('img/spinner_192.gif')?>" width="48">
                </div>
            </td>
        </tr>
    </tfoot>
</table>
