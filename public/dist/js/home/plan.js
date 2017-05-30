$(document).ready(function(){
  activaTab('auto-plan');
});

function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function create_place(){

	$.get({
        url: 'create-place',
        success:function(result)
        {
            $('#create-place').append(result);
        }
    })
}