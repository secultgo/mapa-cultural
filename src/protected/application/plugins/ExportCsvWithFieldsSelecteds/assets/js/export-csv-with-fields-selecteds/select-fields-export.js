var customFields = [];
var isRequestOpen = false;

$('#show-tags-custom-fields').on("load", function () {
    loadTagsCustomFields();
});

/******
 * Operações para status.
 *******/
var toggleFieldStatus = function(id) {
    statusRegistration.forEach(element => {
        if (element.value == id) element.selected = !element.selected;
    });
    $('#status-registration-' + id).toggleClass('selected');
};

/******
 * Operações para as colunas.
 *******/
var loadTagsCustomFields = function () {
    $('#show-tags-custom-fields').html('');

    customFields.forEach(element => {
        if (element.selected) {
            $('#show-tags-custom-fields').append('<a class="tag-selected btn-info" rel="noopener noreferrer" onclick="removeTagElementById(' + element.id + ')">' + element.title + '</a>');
        }
    });
};

var addListSelectedFields = function (id) {
    customFields.forEach(element => {
        if (element.id === id) element.selected = true;
    });
    loadTagsCustomFields();
};

var removeListSelectedFields = function (id) {
    customFields.forEach((element, i) => {
        if (element.id === id) element.selected = false;
    });
    loadTagsCustomFields();
};

var toggleFieldInList = function(id) {
    $('#list-custom-fields-' + id).toggleClass('selected');

    if ($('#list-custom-fields-' + id).hasClass('selected')) {
        this.addListSelectedFields(id);
    } else {
        this.removeListSelectedFields(id);
    }
};

var removeTagElementById = function (id) {
    $('#list-custom-fields-' + id).toggleClass('selected');
    this.removeListSelectedFields(id);
}

/******
 * Operações de requsição.
 *******/
var exportCsvSelectFields = function (url, idOpportunity) {
    if (isRequestOpen) return;
    isRequestOpen = true;

    $.ajax({
        method: "POST",
        url: url,
        data: {
            'id': idOpportunity,
            'category': $('#select-category-registration').find(':selected').val(),
            'status': statusRegistration,
            'customFields': customFields
        }
    }).success(function (data) {
        isRequestOpen = false;

        var downloadLink = document.createElement("a");
        var fileData = ['\ufeff' + data];
        var blobObject = new Blob(fileData, { type: "text/csv;charset=utf-8;" });

        var url = URL.createObjectURL(blobObject);
        downloadLink.href = url;
        downloadLink.download = "oportunidade-" + idOpportunity + "--inscricoes--" + moment().format('YYYY_MM_DD_HH_mm') + ".csv";

        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }).error(function () {
        isRequestOpen = false;
    });
}