$(document).ready(function () {
    var lastCount = $('.video_field:not(#empty_video_field):last').attr('data-count');
    $(document).on('click', '#add_video_field', function (e) {
        e.preventDefault();
        lastCount++;

        $('#empty_video_field').clone()
            .removeAttr('hidden')
            .removeAttr('id')
            .attr('data-count', lastCount)
            .appendTo("#row-video");

        $('.video_field[ data-count=' + lastCount + ']').find('input, textarea').each(function () {
            $(this).attr('name', ($(this).attr('name')).replace('*', lastCount));
        })
    })
})