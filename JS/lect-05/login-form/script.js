	// function checkFields() {
	// 	let input = document.getElementById("full_name");
	//     let email = document.getElementById("email");
	//     let flag = false;
	//     if(input.value == "") {
	//         document.getElementById("n-error").innerText = "Enter Name First";
	//         flag = true;
	//     }
	//     if(email.value == "") {
	//         document.getElementById("e-error").innerText = "Enter Email First";
	//         flag = true;
	//     }
	//     if(flag) {
	//         event.preventDefault();
	//     }
	// }

	// addEventListener( "event", fucntion(currentEvent) {  } )
	let form = document.getElementById("login_form");
	let input = document.getElementById("full_name");
	let email = document.getElementById("email");
	form.addEventListener("submit", function(currentEvent) {
	   	let error = false;
	    if(input.value == "") {
	        document.getElementById("n-error").innerText = "Enter Name First";
	        error = true;
	    }
	    if(email.value == "") {
	        document.getElementById("e-error").innerText = "Enter Email First";
	        error = true;
	    }

	    if(error) {
	    	currentEvent.preventDefault();
	    }
	});


	input.addEventListener("keyup", function(event) {
		if(this.value == "") {
			this.style.borderColor = "red";
			document.getElementById("n-error").innerText = "Enter Name First";
		} else {
			this.style.borderColor = "green";
			document.getElementById("n-error").innerText = "";
		}
	});

	input.addEventListener("blur", function(event) {
		if(this.value == "") {
			this.style.borderColor = "red";
			document.getElementById("n-error").innerText = "Enter Name First";
		} else {
			this.style.borderColor = "green";
			document.getElementById("n-error").innerText = "";
		}
	});