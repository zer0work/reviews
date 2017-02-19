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

	if ( 
			(name != '' && email != '' && text != '') 
		) {
		elem.classList.remove("off");
		date = new Date();
		month = date.getMonth();
		month++;
		date = date.getFullYear() + '-' + month + '-' + date.getDate();

		var field =  document.querySelector('.previewName');
		field.innerHTML = name;

		var field =  document.querySelector('.previewEmail');
		field.innerHTML = email;

		var field =  document.querySelector('.previewDate');
		field.innerHTML = date;


		var field =  document.querySelector('.previewText');
		field.innerHTML = text;
	}
	else {
		var field =  document.querySelector('.errorPrev');
		field .innerHTML = "* Заполните обязательные поля.";
		elem.classList.add("off");
	}
}


