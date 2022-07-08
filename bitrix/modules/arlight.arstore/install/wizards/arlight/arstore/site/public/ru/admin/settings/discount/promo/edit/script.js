var sections = '';

function onSectionChanged(select) {
    var collection = select.selectedOptions;
    var output = "";
    var sectionsId = [];

    for (var i = 0; i < collection.length; i++) {
        if (output === "") {
            output = "Выбрано: ";
        }
        var name = collection[i].label.trim();
        while (name.charAt(0) == '.') {
            name = name.replace(/^\./g, '').trim();
        }

        output += name;
        sectionsId.push(collection[i].value);

        if (i === (collection.length - 2) && (collection.length < 3)) {
            output += " и ";
        } else if (i <= (collection.length - 2)) {
            output += ", ";
        }
    }

    if (output === "") {
        output = "Ничего не выбрано";
    }

    $(select).next('.text').text(output);

    setValueToDescr(sectionsId, 'sections');
}

function setValueToDescr(ar, key) {
    var curVal = {};
    var input = $('#discount-descr');
    if (input.val() != '') {
        curVal = JSON.parse(input.val());
        curVal[key] = ar;
    } else
        curVal[key] = ar;
    input.val(JSON.stringify(curVal)).change();
}

function processFiles(filesInput) {
    var sendData = new FormData();
    sendData.append(($(filesInput).attr('id')), filesInput.files[0]);
    $('.preloader_block').fadeIn();
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: sendData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response != '') {
                var arArt = response.split(';');
                setValueToDescr(arArt, 'articles');
                $('.coupon-alert--article').text("Выбрано: " + response);
            }
        },
        complete: function (response) {
            $('.preloader_block').fadeOut();
        },
        error: function (response) {
            alert('Ошибка. Перезагрузите страницу и попробуйте снова.');
        }
    });
}

$(document).on('click', '#del-coupon-article', function (e) {
    e.preventDefault();
    setValueToDescr([], 'articles');
    $('.coupon-alert--article').text("Ничего не выбрано");
})