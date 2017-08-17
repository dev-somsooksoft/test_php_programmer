$("#btnSearch").on("click",function(){
	var txtBeginLine = $.trim($("input[name=txtBeginLine]").val());
	var txtEndLine = $.trim($("input[name=txtEndLine]").val());
	if(txtBeginLine=="" || txtEndLine==""){
		alert("กรุณากรอกข้อมูลค้นหาให้ครบถ้วน !");
		return false;
	}else{
		$("#btnSearch").attr("disabled",true).html("<i class='fa fa-fw fa-refresh fa-spin'></i>&nbsp;กำลังค้นหา...");
		$.post("person.php",{
			beginline:txtBeginLine,
			endline:txtEndLine,
			rand:Math.random()
		},function(res){
			$("#divResultSearchPerson").html(res);
			$("#btnSearch").attr("disabled",false).html("ค้นหา");
		});
	}
});