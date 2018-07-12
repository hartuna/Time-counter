window.onload = function(){
	var close = document.getElementById('close');
	var importTime = document.getElementById('importTime');
	var start = document.getElementsByClassName('start');
	var zero = document.getElementsByClassName('zero');
	for(var i = 0; i < 3; i++){
		let index = i;
		start[i].addEventListener('click', function(){changeStatus(index)});
		zero[index].disabled = true;
		zero[i].addEventListener('click', function(){clear(index)});
	}
	importTime.addEventListener('click', function(){showForm(0.00)});
	close.addEventListener('click', closeForm);
	if(document.getElementById('result') != null){
		showResult(1.00, 'show');
	}
	time();
}
function changeStatus(index){
	var seconds = new Date();
	var addTime = document.getElementsByClassName('time');	
	var mseconds = document.getElementsByClassName('miliseconds');
	var start = document.getElementsByClassName('start');
	var status = document.getElementsByClassName('status');
	var stop = document.getElementsByClassName('pause');
	var zero = document.getElementsByClassName('zero');
	if(status[index].textContent == 0 || status[index].textContent == 2){
		start[index].textContent = 'Pauza';
		mseconds[index].textContent = seconds.getTime();
		status[index].textContent = 1; 
		zero[index].disabled = true;
	}
	else{
		start[index].textContent = 'Start';
		stop[index].textContent = parseFloat(addTime[index].textContent, 10);
		mseconds[index].textContent = 0;
		status[index].textContent = 0;
		zero[index].disabled = false;
	}
}
function clear(index){
	var addTime = document.getElementsByClassName('time');
	var status = document.getElementsByClassName('status');
	var stop = document.getElementsByClassName('pause');
	var zero = document.getElementsByClassName('zero');
	stop[index].textContent = 0.00;
	addTime[index].textContent = '0.00 min';	
	status[index].textContent = 2; 
	zero[index].disabled = true;
}
function showForm(opacity){
	var importForm = document.getElementById('import');
	var form = document.getElementsByTagName('form');
	opacity += 0.05;
	if(opacity <= 1.00){
		if(opacity == 0.05){
			form[0].style.display = 'inline-block';
		}
		importForm.style.opacity = 1.00 - opacity;
		form[0].style.opacity = opacity;
		setTimeout(function(){showForm(opacity)}, 10);
	}
	else{
		importForm.style.opacity = 0.00;
		importForm.style.display = 'none';
		form[0].style.opacity = 1.00;
	}
}
function closeForm(opacity){
	var importForm = document.getElementById('import');
	var form = document.getElementsByTagName('form');
	importForm.style.display = 'inline-block';
	importForm.style.opacity = 1.00;		
	form[0].style.opacity = 0.00;
	form[0].style.display = 'none';
}
function showResult(opacity, direction){
	var statement = document.getElementById('statement');
	if(direction == 'show'){
		statement.style.display = 'inline-block';
		statement.style.opacity = 1.00;
		direction = 'hide';
		setTimeout(function(){showResult(opacity, direction)}, 1000);
	}
	else{
		if(opacity >= 0.00){
			opacity -= 0.02;
			statement.style.opacity = opacity;
			if(opacity < 0.02){
				statement.style.display = 'none';
			}
			setTimeout(function(){showResult(opacity, direction)}, 10);
		}
	}
}
function time(){
	var seconds = new Date();
	var addTime = document.getElementsByClassName('time');
	var diode = document.getElementsByClassName('diode');	
	var input = document.getElementsByTagName('input');
	var mseconds = document.getElementsByClassName('miliseconds');
	var status = document.getElementsByClassName('status');
	var stop = document.getElementsByClassName('pause');
	for(var i = 0; i < 3; i++){
		if(status[i].textContent == 1){
			addTime[i].textContent =  (parseFloat(stop[i].textContent, 10) + (seconds.getTime() - mseconds[i].textContent) / 60000).toFixed(2) + ' min';
			diode[i].style.backgroundColor = '#0c0';
		}
		else if(status[i].textContent == 2){
			diode[i].style.backgroundColor = '#c00';
		}
		else{
			diode[i].style.backgroundColor = '#fb0';
		}
		input[i].value = addTime[i].textContent;
	}
	setTimeout(time, 100);
}