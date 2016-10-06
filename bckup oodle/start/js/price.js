$(document).on('ready', function() {
    $('input[type=checkbox]').change(function(e){

    if($(this).is(':checked'))
    {
        var cls = e.target.className;
        var ids = e.target.id;
        $('#'+cls+ids).css('visibility','visible');
    }
    else
    {
        var cls = e.target.className;
        var ids = e.target.id;
        $('#'+cls+ids).css('visibility','hidden');
    }    

});
});