<?php
namespace ExportCsvWithFieldsSelecteds;

use MapasCulturais\i;
use MapasCulturais\App;
use MapasCulturais\Entities;

class Plugin extends \MapasCulturais\Plugin {

    public function __construct($config = []) {
        $config += [
            'defaultFields' => ['Número', 'Nome do projeto', 'Categoria', 'Avaliação', 'Status', 'Inscrição - Data/Hora de envio']
        ];

        $this->config = $config;
        parent::__construct($config);
    }

    public function _init() {
        $app = App::i();
        $config = $this->config;

        $app->hook('template(opportunity.single.export-csv-with-fields-selecteds):filter', function () use ($app, $config) {
            $idOpportunity = null;
            $customFields = [];
            
            if (!is_null($this->data['entity'])) {
                $idOpportunity = $this->data['entity']->id;
                $registrationFieldConfig = $app->repo('RegistrationFieldConfiguration')->findBy(
                    array('owner' => $idOpportunity),
                    array('displayOrder' => 'ASC')
                );

                foreach($registrationFieldConfig as $field) {
                    $customFields[] = array(
                        'id' => $field->id,
                        'title' => $field->title,
                        'required' => $field->required,
                        'selected' => true
                    );
                }
            }

            $app->view->enqueueScript('app', 'exportcsv', 'js/export-csv-with-fields-selecteds/ng.module.export.js');
            $this->part('select-fields-export', array(
                'entity' => $this->data['entity'],
                'defaultFields' => $config['defaultFields'],
                'customFields' => $customFields
            ));
        });
    }

    public function register() {
        $app = App::i();
        $app->registerController('exportCsvWithFieldsSelecteds', Controllers\ExportCsvWithFieldsSelecteds::class);
    }

}
