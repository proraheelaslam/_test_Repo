$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
function create_datatables(url, columns, order, pageLength = '10')
{
	
    if(order === undefined || order === null)
    {
      order=[];
    }
    

    $('#datatable').DataTable({
        processing: true,
        processing: true,
        serverSide: true,
        ajax: {
          url: url,
          type:"GET",
        },
        initComplete:function( settings, json){
            $('.tooltips').tooltip();
        },
        columns: datatable_columns,
        "order": order,
        pageLength: pageLength
    });
}

