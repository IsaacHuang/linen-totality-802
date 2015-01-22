<script type="text/javascript">
var dragging = false;
var test;
var mouseY;
var mouseX;
window.onload = function(){
	test = document.getElementById("test");
	test.onmousedown = down;
	test.onmousemove = move;
	document.onmouseup = up;
	test.style.position = "relative";
	test.style.top = "0px";
	test.style.left = "0px";
}
function down(event)
{
	event = event || window.event; 
	dragging = true; 
	mouseX = parseInt(event.clientX);
	mouseY = parseInt(event.clientY);
	objY = parseInt(test.style.top);
	objX = parseInt(test.style.left);
}
function move(event){
	event = event || window.event; 
	if(dragging == true){
		var x,y;
		y = event.clientY - mouseY + objY;
		x = event.clientX - mouseX + objX;
		test.style.top = y + "px";
		test.style.left = x + "px";
	}
}
function up(){
	dragging = false;
}
</script>