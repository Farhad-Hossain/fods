$("#datatable_modal_table").dataTable();
function collect_restaurant_reviews_and_arise_modal(route_url)
{
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	$.ajax({
	   type:'GET',
	   url: route_url,

	   success:function(data){
		  console.log(data);
		  $("#datatable_modal_table tbody").empty();
		  for(var i = 0; i < data.length; i++){
		  	var sl = "<td>"+(i+1)+"</td>";

		  	var customer = "<td>"+data[i].user_id+"</td>";
		  	var review_content = "<td>"+data[i].review_content+"</td>";

		  	var row = "<tr>"+sl+customer+review_content+"</tr>";

		    $("#datatable_modal_table tbody").append(row);
		  }
		  $("#reviews_modal").modal('show');
	   }
	});
}

function collect_food_reviews_and_arise_modal(route_url)
{	
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$.ajax({
	   type:'GET',
	   url: route_url,

	   success:function(data){
		  console.log(data);
		  $("#datatable_modal_table tbody").empty();
		  for(var i = 0; i < data.length; i++){
		  	var sl = "<td>"+(i+1)+"</td>";

		  	var customer = "<td>"+data[i].user_id+"</td>";
		  	var review_content = "<td>"+data[i].review_content+"</td>";

		  	var row = "<tr>"+sl+customer+review_content+"</tr>";

		    $("#datatable_modal_table tbody").append(row);
		  }
		  $("#reviews_modal").modal('show');
	   }
	});
}