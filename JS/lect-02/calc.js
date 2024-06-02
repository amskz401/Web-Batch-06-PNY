function btnValue(btn) {
	box = document.getElementById("result-box");

	if( btn == "=" ) {
		box.value = eval(box.value);
	}
	else {
		box.value = box.value + btn;
	}
}