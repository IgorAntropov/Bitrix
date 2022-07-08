var masterCalcExeTimer = false;

function masterCalcExecution(form, context) {
/*
	clearTimeout(masterCalcExeTimer);
	var preLoaderCalc = new arlightPreloader('.master-calc form');
	var context = context || false;
	masterCalcExeTimer = setTimeout(function() {
		if (context) {
			var contextFieldId = context.getAttribute('id');
		}

		var templateCalcFile = form.querySelector('input[data-name="templateCalcFile"]');
		if (templateCalcFile) {
			templateCalcFile = templateCalcFile.value;
		} else {
			return;
		}

		var serializeForm = form.serializeForm();
		var r = new XMLHttpRequest();
        r.open('POST', templateCalcFile + '?rnd=' + Math.random() + Math.random() + Math.random() + Math.random(), true);
		r.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		r.onreadystatechange = function() {

			if (r.readyState != 4 || r.status != 200) return false;
			var response = r.responseText;

			var testurnNormalised = BX.processHTML(response);

			var ret_html = testurnNormalised.HTML;
			var ret_sctipts = testurnNormalised.SCRIPT;
			var ret_styles = testurnNormalised.STYLE;

			var resultBlock = form.closest('.master-calc');
			resultBlock.innerHTML = ret_html;

			for(var i = 0; i < ret_sctipts.length; i++){
				var script_row = ret_sctipts[i];
				var newScript = document.createElement('script');
				newScript.innerHTML = script_row.JS;
				resultBlock.appendChild(newScript);
			}

			for(var i = 0; i < ret_styles.length; i++){
				var style_row = ret_styles[i];
				var newStyle = document.createElement('style');
				newStyle.innerHTML = style_row.CSS;
				resultBlock.appendChild(newStyle);
			}

			setTimeout(function() {
				preLoaderCalc.removePreloader();
				if (contextFieldId) {
					var newContextEl = document.querySelector('.master-calc #' + contextFieldId);
					if (newContextEl) {
						focusElement(newContextEl);
					}
				}
			}, 300);
		};
		preLoaderCalc.addPreloader();
		r.send(serializeForm);
	}, 700);
*/
}

/**
 * @param {event}event
 * @param {string}data - Дата атрибут показывающий какой элемент открыт
 * @param {string}dataBlock - Дата атрибут селектор элементов
 * * * над которые будут скрываться/показываться
 */
function changeSelectType(event, data, dataBlock) {
	var target = (typeof event === 'object') ?
		event.target : (typeof event === 'string') ? document.querySelector(event) : '';
	if (target !== '') {
        var elements = Array.from(document.querySelectorAll('[' + dataBlock + ']'));
        elements.forEach(function(elem) {
            var parent = elem.closest('[data-param]');

            if (elem.getAttribute(data) === target.value) {
                parent.removeAttribute('hidden');
                elem.setAttribute('required', 'required');
            } else {
                parent.setAttribute('hidden', 'hidden');
                elem.removeAttribute('required');
                elem.value = '';
            }
        });
    }
}
