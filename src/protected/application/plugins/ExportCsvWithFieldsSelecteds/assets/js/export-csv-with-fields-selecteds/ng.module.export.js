(function (angular) {
    var module = angular.module('module.export', ['ngSanitize']);

    module.controller('ExportController', ['$scope', 'ExportService', function ($scope, ExportService) {
        $scope.defaultFields = [
            {fieldName: "number", title:labels["Inscrição"] ,required:true},
            {fieldName: "category", title:labels['Categorias'] ,required:true},
            {fieldName: "agents", title:labels['Agentes'] ,required:true},
            {fieldName: "attachments", title:labels['Anexos']  ,required:true},
            {fieldName: "evaluation", title: labels['Avaliação'] ,required:true},
            {fieldName: "date", title:labels['DataEnvioInscricao'] ,required:true},
            {fieldName: "status", title:labels['Status'] ,required:true},
        ];

        $scope.customFields = [];
        $scope.registrationTableColumns = {
            teste: true,
            category: true,
            agents: true,
            attachments: true,
            evaluation: true,
            date: true,
            status: true
        };
    }]);
})(angular);