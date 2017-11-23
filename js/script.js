$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url+'inc/getData.php',
        data: {page:page}
    }).done(function(data){
    	total_page = Math.ceil(data.total/10);
    	current_page = page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;

    });

}

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url+'inc/getData.php',
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}


/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.name+'</td>';
	  	rows = rows + '<td>'+value.secondname+'</td>';
        rows = rows + '<td>'+value.email+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var secondname = $("#create-item").find("input[name='secondname']").val();
    var email = $("#create-item").find("input[name='email']").val();


    if(name != '' && secondname != '' && email != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{name:name, secondname:secondname, email:email}
        }).done(function(data){
            $("#create-item").find("input[name='name']").val('');
            $("#create-item").find("input[name='secondname']").val('');
            $("#create-item").find("input[name='email']").val('');

            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success', {timeOut: 5000});
        });
    }else{
        alert('You are missing name or secondname.')
    }


});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'inc/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success', {timeOut: 5000});
        getPageData();
    });

});


/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var name = $(this).parent("td").prev("td").prev("td").text();
    var secondname = $(this).parent("td").prev("td").text();
    var email = $(this).parent("td").prev("td").text();

    $("#edit-item").find("input[name='name']").val(name);
    $("#edit-item").find("input[name='secondname']").val(secondname);
    $("#edit-item").find("input[name='email']").val(email);
    $("#edit-item").find(".edit-id").val(id);

});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var name = $("#edit-item").find("input[name='name']").val();
    var secondname = $("#edit-item").find("input[name='secondname']").val();
    var email = $("#edit-item").find("input[name='email']").val();

    var id = $("#edit-item").find(".edit-id").val();

    if(name != '' && secondname != '' && email != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{name:name, secondname:secondname, email:email, id:id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing name or secondname.')
    }

});
});