
function validatiopn_file(elem){
	if( elem.files && elem.files[0] ){
		var files = elem.files[0];

		if((files.type != "application/pdf" && files.type != "application/msword" && files.type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ){
			swal("Oops!","Sorry, File should in type csv, xls, or xlsx only, ", "warning");
			$(elem).val("");
		}

		console.log(files);
	}
}