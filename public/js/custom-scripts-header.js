function reinittooltips(id){
    $(".panel-body").on('DOMSubtreeModified', "#"+id+"_info", function() {
        $('.panel-body').find('.tooltips').tooltip();
    });
}