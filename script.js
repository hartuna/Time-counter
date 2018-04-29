window.onload = function(){
	var button = document.getElementsByTagName('button');
	for(var i = 0; i < 3; i++){
		let index = i;
		button[i].addEventListener('click', function(){changeStatus(index)});
	}
	time();
}
function changeStatus(index){
	var seconds = new Date();
	var addTime = document.getElementsByClassName('time');	
	var button = document.getElementsByTagName('button');
	var mseconds = document.getElementsByClassName('miliseconds');
	var status = document.getElementsByClassName('status');
	var stop = document.getElementsByClassName('pause');
	if(status[index].textContent == 0){
		button[index].textContent = 'Pauza';
		mseconds[index].textContent = seconds.getTime();
		status[index].textContent = 1; 
	}
	else{
		button[index].textContent = 'Start';
		stop[index].textContent = parseFloat(addTime[index].textContent, 10);
		mseconds[index].textContent = 0;
		status[index].textContent = 0;
	}
}
function time(){
	var seconds = new Date();
	var status = document.getElementsByClassName('status');
	var addTime = document.getElementsByClassName('time');	
	var mseconds = document.getElementsByClassName('miliseconds');
	var stop = document.getElementsByClassName('pause');
	for(var i = 0; i < 3; i++){
		if(status[i].textContent == 1){
			addTime[i].textContent =  (parseFloat(stop[i].textContent, 10) + (seconds.getTime() - mseconds[i].textContent) / 60000).toFixed(2) + ' min';
		}
	}
	setTimeout(time, 100);
}