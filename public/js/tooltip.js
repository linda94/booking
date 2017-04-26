$(document).ready(function () {
    size_li = $("#list_limiter li").size();
    x=3;
    $('#list_limiter li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+5 <= size_li) ? x+5 : size_li;
        $('#list_limiter li:lt('+x+')').show();
    });
});