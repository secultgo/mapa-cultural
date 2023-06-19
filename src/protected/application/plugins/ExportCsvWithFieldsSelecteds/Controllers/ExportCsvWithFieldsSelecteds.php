<?php

namespace ExportCsvWithFieldsSelecteds\Controllers;

use MapasCulturais\App;
use MapasCulturais\i;
use MapasCulturais\Entities\Registration as R;

class ExportCsvWithFieldsSelecteds extends \MapasCulturais\Controller {

    public function POST_report($data = null) {
        $this->requireAuthentication();
        $app = App::i();

        if (empty($this->postData['id'])) {
            $app->pass();
        }

        $entity = $app->repo('Opportunity')->find($this->postData['id']);
        $entity->checkPermission('@control');

        // Carrega o HEADER.
        $headers = ['Número', 'Nome do projeto', 'Categoria', 'Avaliação', 'Status', 'Inscrição - Data/Hora de envio'];
        $idRegistrationMetaList = [];
        foreach ($this->postData['customFields'] as $field) {
            if ($field['selected'] == "true") {
                $headers[] = $field['title'];
                $idRegistrationMetaList[] = 'field_' . $field['id'];
            }
        }

        // Carregas o BODY
        $body = [];
        $registers = $app->repo('Registration')->findBy(array('opportunity' => $this->postData['id']));
        foreach ($registers as $key => $register) {
            $body[$key] = [
                $register->number,
                '',
                '',
                $this->getStatusName($register->status),
                !empty($register->sentTimestamp) ? $register->sentTimestamp->format('d/m/y H:i') : ''
            ];

            $resp = $app->repo('RegistrationMeta')->findBy(array('owner' => $register->id, 'key' => $idRegistrationMetaList));
            
            foreach ($resp as $registrationMeta) {
                $body[$key][] = $registrationMeta->value ?? "";
            }
        }

        $this->reportOutput('report-csv', ['headers' => $headers, 'body' => $body], "nome");
    }

    protected function reportOutput($view, $data, $filename){
        $app = App::i();
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');

        $response = $app->response();
        $response['Content-Encoding'] = 'UTF-8';
        $response['Content-Type'] = 'application/force-download';
        $response['Content-Disposition'] = 'attachment; filename=' . $filename . '.csv';
        $response['Pragma'] = 'no-cache';

        $app->contentType('text/csv; charset=UTF-8');

        ob_start();
        require_once __DIR__ . "./../layouts/parts/report-csv.php";
        $output = ob_get_clean();

        /**
         * @todo criar regex para os replaces abaixo
         */
        $replaces = [
            '<!-- BaseV1/views/opportunity/report-drafts-csv.php # BEGIN -->',
            '<!-- BaseV1/views/opportunity/report-drafts-csv.php # END -->',
            '<!-- BaseV1/views/opportunity/report-csv.php # BEGIN -->',
            '<!-- BaseV1/views/opportunity/report-csv.php # END -->'
        ];

        foreach ($replaces as $replace) {
            $output = str_replace($replace, '', $output);
        }

        echo $output;
    }

    protected function getStatusName($status) {
        switch ($status) {
            case R::STATUS_APPROVED:
                return i::__('Selecionada');
                break;

            case R::STATUS_NOTAPPROVED:
                return i::__('Não Selecionada');
                break;

            case R::STATUS_WAITLIST:
                return i::__('Suplente');
                break;

            case R::STATUS_INVALID:
                return i::__('Inválida');
                break;

            case R::STATUS_SENT:
                return i::__('Pendente');
                break;
            default:
                return '';
        }
    }
}