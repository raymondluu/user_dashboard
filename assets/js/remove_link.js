$(document).ready(function(){
	$("a[name=remove_link]").on("click", function(){
		var bool = confirm("Are you sure you want to delete user?");
		if(bool)
		{
			window.location.href = $(this).attr("holdlink");
		}
		else
		{
			window.location.href = "/dashboard/admin";
		}
	});
});