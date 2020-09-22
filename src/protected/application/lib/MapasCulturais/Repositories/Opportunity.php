<?php
namespace MapasCulturais\Repositories;
use MapasCulturais\Traits;
use MapasCulturais\Entities\ProjectOpportunity;
use MapasCulturais\Entities\Project;

class Opportunity extends \MapasCulturais\Repository{
    use Traits\RepositoryKeyword,
        Traits\RepositoryAgentRelation;

    function findRegistrationDateByIds($opportunitiesIds) {
        $query = $this->_em->createQuery("
        SELECT 
            op.id, op.name, op.registrationFrom, op.registrationTo
        FROM
            MapasCulturais\Entities\Opportunity op
        WHERE 
            op.id in (:opportunitiesIds)
        ");
    
        $params = [
            'opportunitiesIds' => $opportunitiesIds,
        ];

        $query->setParameters($params);

        return $query->getArrayResult();
    }

    function findByProjectAndOpportunityMeta(Project $project, $key, $value, $status = 1) {
        $projectsIds = $project->getChildrenIds();
        $projectsIds[] = $project->id;

        $query = $this->_em->createQuery("
        SELECT 
            po
        FROM
            MapasCulturais\Entities\OpportunityMeta om
            JOIN MapasCulturais\Entities\ProjectOpportunity po WITH om.owner=po
            JOIN po.ownerEntity oe
        WHERE 
            po.status = :status AND 
            om.key=:key AND 
            om.value=:value AND 
            oe.id in (:projectsIds)
        ");
    
        $params = [
            'status' => $status,
            'projectsIds' => $projectsIds,
            'key'=>$key,
            'value'=>$value,
        ];

        $query->setParameters($params);

        return $query->getResult();
    }
}

