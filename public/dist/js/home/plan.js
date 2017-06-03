$(document).ready(function(){
  activaTab('auto-plan');

});


function activaTab(tab){
  $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

function add_place(){
	$.ajax({
        type: 'get',
        url: 'create-place',
        success:function(result)
        {
            $('#create-place').append(result);
        }
    })
}

$('form .submit-place').on('click', function(){
    var url = "create-place",
        that = $(this),
        data = {};
    that.find('[name]').each(function(index,value){
        console.log(value);
    })
    return false;
});
function create_place() {

    $('form.create_place').on('submit', function(){
        var url = "create-place",
            that = $(this),
            data = {};
        that.find('[name]').each(function(index,value){
            console.log($(this).att('name'));
        })
        return false;
    });
    /*var data = {}
    $.ajax({
        type: 'post',
        url: 'create-place',
        success:function(result)
        {
            $('#create-place').append(result);
        }
    })*/

}
function remove_place() {
    $('#create-place').on('click', '.close', function(e) {
        e.preventDefault();
        $(this).parent().remove();
    });
}