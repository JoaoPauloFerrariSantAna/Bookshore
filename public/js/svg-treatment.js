
document.getElementById("eye-open").addEventListener("click", showPass);
document.getElementById("eye-closed").addEventListener("click", hidePass);



function showPass() {
	const passwordField = document.getElementById("password");
	const eye_open_img = document.getElementById("eye-open");
	const eye_closed_img = document.getElementById("eye-closed");

	if(passwordField.type === "password") {
		eye_open_img.classList.add("img-disabled");
		eye_closed_img.classList.remove("img-disabled");

		passwordField.type = "text";
	}
}

function hidePass() {
	const passwordField = document.getElementById("password");
	const eye_open_img = document.getElementById("eye-open");
	const eye_closed_img = document.getElementById("eye-closed");

	if(passwordField.type === "text") {
		eye_open_img.classList.remove("img-disabled");
		eye_closed_img.classList.add("img-disabled");

		passwordField.type = "password";
	}
}
