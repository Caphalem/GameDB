$('#min_req').click(function(e) {
    e.preventDefault();
    $(this).hide();
    $('.min_req').show();
});
$('#min_hide').click(function(e) {
    e.preventDefault();
    $('.min_req').hide();
    $('#min_req').show();
});

$('#rec_req').click(function(e) {
    e.preventDefault();
    $(this).hide();
    $('.rec_req').show();
});
$('#req_hide').click(function(e) {
    e.preventDefault();
    $('.rec_req').hide();
    $('#rec_req').show();
});