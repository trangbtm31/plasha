$(document).ready(function(){
  activaTab('auto-plan');
});

function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function create_place(){
	$.ajax({
        type: 'get',
        url: 'create-place',
        success:function(result)
        {
            $('#create-place').append(result);
        }
    })
}

function remove_place() {
    $('#create-place').on('click', '.close', function(e) {
        e.preventDefault();
        $(this).parent().remove();
    });
}