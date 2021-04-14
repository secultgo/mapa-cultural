<?php use MapasCulturais\i; ?>
<textarea style='width: 100%;height: 200px' ng-required="requiredField(field)" ng-model="entity[fieldName]" ng-blur="saveField(field, entity[fieldName])"  maxlength="{{:: !field.maxSize ? '': field.maxSize }}"></textarea>
<div style='white-space: pre-line' ng-if="::field.maxSize">
    {{entity[fieldName].length ? entity[fieldName].length : 0}} / {{::field.maxSize}}
</div>