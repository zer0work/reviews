function handleFiles(files) {
	file = files[0];
	imageType = /^image\//;
	var img = document.createElement("img");

		img.classList.add("obj");
		img.file = file;
		preview = document.querySelector("#previmage");
		preview.appendChild(img); 
		
		var reader = new FileReader();
		reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
		reader.readAsDataURL(file);
}

function getFormData() {
	name  = document.forms["reviewForm"].elements["userName"].value;
	email = document.forms["reviewForm"].elements["userEmail"].value;
	text  = document.forms["reviewForm"].elements["userText"].value;

	var elem = document.querySelector(".preview");
	elem.classList.remove("off");

	if ( name != '' && email != '' && text != '' ) {
		date = new Date();
		month = date.getMonth();
		month++;
		date = date.getFullYear() + '-' + month + '-' + date.getDate();

		var field =  document.getElementById('previewName');
		field.innerHTML = name;

		var field =  document.getElementById('previewEmail');
		field.innerHTML = email;

		var field =  document.getElementById('previewDate');
		field.innerHTML = date;


		var field =  document.getElementById('previewText');
		field.innerHTML = text;
}
	else {
		elem.innerHTML = "*Заполните обязательные поля.";
	}
}


