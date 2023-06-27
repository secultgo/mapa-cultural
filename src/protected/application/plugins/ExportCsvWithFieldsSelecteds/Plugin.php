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
                'status' => array(
                    ['value' => 10,'label' => i::__('Selecionada'), 'selected' => true],
                    ['value' => 3, 'label' => i::__('Não selecionada'), 'selected' => true],
                    ['value' => 0, 'label' => i::__('Rascunho'), 'selected' => true],
                    ['value' => 1, 'label' => i::__('Pendente'), 'selected' => true],
                    ['value' => 2, 'label' => i::__('Inválida'), 'selected' => true],
                    ['value' => 8, 'label' => i::__('Suplente'), 'selected' => true],
                    ['value' => 11, 'label' => i::__('Cancelada'), 'selected' => true]
                ),
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
