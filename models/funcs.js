/*
New test app
*/
function showHide(div){
	if(document.getElementById(div).style.display = 'block'){
		document.getElementById(div).style.display = 'none';
	}else{
		document.getElementById(div).style.display = 'block'; 
	}
}


function loadValues(num){
	var init = [];
	for (var i = 0; i < num; i++) {
		init.push("0");
	}
	document.getElementById("figures").value = init;
}

function inc(num){
	var v = Number(document.getElementById("v" + num).innerHTML) + 1;
	var figures = document.getElementById("figures").value.split(",");

	figures[num - 1] = v;
	document.getElementById("figures").value = figures;	
	document.getElementById("v" + num).innerHTML = v;
	v = v * parseFloat(document.getElementById("p" + num).innerHTML);
	document.getElementById("t" + num).innerHTML = parseFloat(Math.round(v.toFixed(2) * 100) / 100).toFixed(2);
	totalValue();
}

function dec(num){
	var v = Number(document.getElementById("v" + num).innerHTML) - 1;
	if(v >= 0){
		var figures = document.getElementById("figures").value.split(",");

		figures[num - 1] = v;
		document.getElementById("figures").value = figures;	
		document.getElementById("v" + num).innerHTML = v;
		v = v * parseFloat(document.getElementById("p" + num).innerHTML);
		document.getElementById("t" + num).innerHTML = parseFloat(Math.round(v.toFixed(2) * 100) / 100).toFixed(2);
	}
	totalValue();
}

function totalValue(){
	var sum = 0;
	for (var i = 1; i < 20; i++) {
		try {
		    sum = sum + parseFloat(document.getElementById("t" + i).innerHTML);
		}
		catch(err) {
		    break;
		}
	}
	if(sum > 0)
	{
		document.getElementById("total").innerHTML = "Buy for PHP " + sum.toFixed(2);
	}
	else
	{
		document.getElementById("total").innerHTML = "ORDER NOW";
	}
}

