<div id="resources" class="aba-content">
    <?php if($entity->canUser('viewEvaluations') || $entity->canUser('@control')): // se  ?>
        <?php $this->part('singles/opportunity-resources--admin--table', ['entity' => $entity]) ?>
    <?php endif; ?>

</div>
<!--#resources-->
