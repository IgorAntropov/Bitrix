$.fn.hyphenate = function (align) {
    var all = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]",
        glas = "[аеёиоуыэю\я]",
        sogl = "[бвгджзклмнпрстфхцчшщ]",
        zn = "[йъь]",
        shy = "\xAD",
        re = [];
    re[1] = new RegExp("(" + zn + ")(" + all + all + ")", "ig");
    re[2] = new RegExp("(" + glas + ")(" + glas + all + ")", "ig");
    re[3] = new RegExp("(" + glas + sogl + ")(" + sogl + glas + ")", "ig");
    re[4] = new RegExp("(" + sogl + glas + ")(" + sogl + glas + ")", "ig");
    re[5] = new RegExp("(" + glas + sogl + ")(" + sogl + sogl + glas + ")", "ig");
    re[6] = new RegExp("(" + glas + sogl + sogl + ")(" + sogl + sogl + glas + ")", "ig");

    var allPretxt = ['в', 'без', 'до', 'из', 'к', 'на', 'по', 'о', 'от', 'перед', 'при', 'через', 'с', 'у', 'за', 'над', 'об', 'под', 'про', 'для', 'из-под', 'из-за', 'по-над', 'и', 'а', 'но', 'да', 'или', 'либо', 'ни–ни', 'то–то', 'что', 'чтобы', 'как', 'потому что', 'так как', 'если', 'хотя', 'когда', 'как только', 'между тем как', 'лишь', 'лишь только', 'едва', 'едва лишь', 'пока', 'так что', 'если бы', 'не', 'ни'],
        allNspace = [],
        nbsp = "\xa0";

    allPretxt.forEach(function (item, i, arr) {
        allNspace[allNspace.length] = ' ' + item + ' ';
    });

    return this.each(function () {
        var text = $(this).html();

        //запрет переноса предлогов
        allNspace.forEach(function (item, i, arr) {
            var reg = new RegExp("(" + item + ")", "ig");
            function replacer(match){
                return match.replace(/\s+$/g, '')+ nbsp;
            }
            text = text.replace(reg, replacer);
        });

        //перенос по слогам
        // for (var i = 1; i < 7; ++i) {
        //     text = text.replace(re[i], "$1" + shy + "$2");
        // }

        //для чисел и ед.измерения
        var unitAll = ['шт/м', 'шт', 'м', 'V', 'мм', 'Вт', 'K', 'А', 'mm', 'W', 'г', 'LED', 'W/метр', 'шт/метр', 'LED/m', 'm', 'Lm', 'вольт', 'В'];
        unitAll.forEach(function (item, i, arr) {
            var regnumber = '([0-9]{1,})(\\s)?';
            var reg = RegExp(regnumber + "(" + item + ")", "g");
            function replacerUnit(match, p1, p2, p3) {
                if (p3.indexOf('/') + 1){
                    //не разрывать единицы измерения
                    p3 = '<span style="white-space: nowrap">'+p3+'</span>'
                }
                return p1 + nbsp + p3;
            }
            text = text.replace(reg, replacerUnit);
        });

        $(this).html(text).css('text-align', align);

        $(this).find('a').each(function () {
            var href = ($(this).attr('href')).replace(nbsp, '');
            href = href.replace(' ', '');
            $(this).attr('href', href);
        });

        $(this).find('img').each(function () {
            var src = ($(this).attr('src')).replace(nbsp, '').replace(' ', '').replace(' ', '');
            $(this).attr('src', src);
        });
    });
};
