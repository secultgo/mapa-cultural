<?php

namespace ExportCsvWithFieldsSelecteds\Controllers;

use MapasCulturais\App;
use MapasCulturais\i;
use MapasCulturais\Entities\Registration as R;

class ExportCsvWithFieldsSelecteds extends \MapasCulturais\Controller {

    public function POST_report($data = null) {
        $this->requireAuthentication();
        $app = App::i();
        $conn = App::i()->em->getConnection();
        $customFields = $this->postData['customFields'] ?? [];

        if (empty($this->postData['id'])) {
            $app->pass();
        }

        $entity = $app->repo('Opportunity')->find($this->postData['id']);
        $entity->checkPermission('@control');

        // Carrega o HEADER.
        $headers = ['Número', 'Nome do projeto', 'Categoria', 'Avaliação', 'Status', 'Inscrição - Data/Hora de envio'];
        $idRegistrationMetaList = [];
        foreach ($customFields as $field) {
            if ($field['selected'] == "true") {
                $headers[] = $field['title'];
                $idRegistrationMetaList[] = $field['id'];
            }
        }

        $statusIds = [];
        foreach ($this->postData['status'] as $stat) {
            if ($stat['selected'] == "true") {
                $statusIds[] = $stat['value'];
            }
        }

        // Carregas o BODY
        $body = [];
        $test = [];
        $registers = $app->repo('Registration')->findBy(array('opportunity' => $this->postData['id'], 'status' => $statusIds));
        foreach ($registers as $key => $register) {
            $evaluations = $app->repo('RegistrationEvaluation')->findBy(array('registration' => $register->id));

            $body[$key] = [
                $register->number,
                '',
                $register->category != null ? $register->category : '',
                $this->getUserEvaluationString($register->getUserEvaluations()),
                $this->getStatusName($register->status),
                !empty($register->sentTimestamp) ? $register->sentTimestamp->format('d/m/y H:i') : ''
            ];

            if (empty($idRegistrationMetaList)) {
                break;
            }

            foreach ($idRegistrationMetaList as $id) {
                $body[$key]['field_' . $id] = null;
            }

            $registrationsMeta = $conn->fetchAll($this->getDynamicFieldsSql($register->id, $idRegistrationMetaList));
            foreach ($registrationsMeta as $registrationMeta) {
                $body[$key][$registrationMeta['key']] = $registrationMeta['value'] ?? null;
            }
        }
        
        $this->reportOutput('report-csv', ['headers' => $headers, 'body' => $body], 'opportunity-' . time() . '.csv');
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

    protected function getUserEvaluationString($evaluations) {
        $str = '';
        foreach ($evaluations as $eval) {
            // dd($eval->evaluationData);
            // $str .= 'Avaliação ' . $eval->id . ':' . $eval->evaluationData->status . ". Obs.:" . $eval->evaluationData->obs . '\n';
        }
        return $str;
    }

    protected function getDynamicFieldsSql($idOwner, $idLists) {
        $totalCampos = count($idLists);
        $orderBy = '';
        $fieldList = '';

        foreach ($idLists as $key => $id) {
            $orderBy .= ' RM.key = \'field_' . $id . '\' DESC ';
            $fieldList .= '\'field_' . $id . '\''; 

            if ($key != $totalCampos - 1) {
                $orderBy .= ',';
                $fieldList .= ',';
            }
        }

        $sql = 'SELECT RM.id, RM.key, RM.value ';
        $sql .= 'FROM registration_meta RM ';
        $sql .= 'INNER JOIN registration R ON R.id = RM.object_id ';
        $sql .= 'WHERE R.id = ' . $idOwner . ' ';
        $sql .= 'AND RM.key IN (' . $fieldList . ') ';
        $sql .= 'ORDER BY ' . $orderBy;
        return $sql;
    }
}