$(document).ready(function(){
  activaTab('auto-plan');

});

/*
var Slider = function() { this.initialize.apply(this, arguments) }
Slider.prototype = {

    initialize: function(slider) {
        this.ul = slider.children[0]
        this.li = this.ul.children

        // make <ul> as large as all <li>’s
        this.ul.style.width = (this.li[0].clientWidth * this.li.length) + 'px'

        this.currentIndex = 0
    },

    goTo: function(index) {
        // filter invalid indices
        if (index < 0 || index > this.li.length - 1)
            return

        // move <ul> left
        this.ul.style.left = '-' + (100 * index) + '%'

        this.currentIndex = index
    },

    goToPrev: function() {
        this.goTo(this.currentIndex - 1)
    },

    goToNext: function() {
        this.goTo(this.currentIndex + 1)
    }
}*/


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