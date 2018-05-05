window.onload = function(){
	var zero = document.getElementsByClassName('zero');
	var start = document.getElementsByClassName('start');
	for(var i = 0; i < 3; i++){
		let index = i;
		start[i].addEventListener('click', function(){changeStatus(index)});
		zero[i].addEventListener('click', function(){clear(index)});
	}
	time();
}
function changeStatus(index){
	var seconds = new Date();
	var addTime = document.getElementsByClassName('time');	
	var zero = document.getElementsByClassName('zero');
	var mseconds = document.getElementsByClassName('miliseconds');
	var start = document.getElementsByClassName('start');
	var status = document.getElementsByClassName('status');
	var stop = document.getElementsByClassName('pause');
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
	stop[index].textContent = 0.00;
	addTime[index].textContent = '0.00 min';	
	status[index].textContent = 2; 
}
function time(){
	var seconds = new Date();
	var addTime = document.getElementsByClassName('time');
	var diode = document.getElementsByClassName('diode');	
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
			diode[i].style.backgroundColor = '#ca0';
		}
	}
	setTimeout(time, 100);
}