"use strict";
var interval = 3000;
var numberOfBlocks = 9;
var numberOfTarget = 3;
var targetBlocks = [];
var selectedBlocks = [];
var timer;

document.observe('dom:loaded', function(){
	$("start").onclick = stopToStart;
	$("stop").onclick = stopGame;
});

function stopToStart(){
    stopGame();
	clearInterval(timer);
    startToSetTarget();
}

function stopGame(){
	$("state").innerHTML="Stop";
	$("answer").innerHTML="0/0";
	targetBlocks=[];
	selectedBlocks=[];
}

function startToSetTarget(){
	clearInterval(timer);
	timer = setInterval(setTargetToShow, interval);	
	$("state").innerHTML="Ready";
	targetBlocks=[];
	selectedBlocks=[];
	
	
	targetBlocks.push(Math.floor((Math.random() * 10))%9); //select to 0~8 random number;
	targetBlocks.push(Math.floor((Math.random() * 10))%9); //select to 0~8 random number;
	while(targetBlocks[1]==targetBlocks[0]){
		targetBlocks.push(Math.floor((Math.random() * 10))%9); //select to 0~8 random number;
	}
	targetBlocks.push(Math.floor((Math.random() * 10))%9); //select to 0~8 random number;
	while(targetBlocks[2]==targetBlocks[0] || targetBlocks[1]==targetBlocks[2]){ 
	targetBlocks.push(Math.floor((Math.random() * 10))%9); //select to 0~8 random number;
	}

}

function setTargetToShow(){
	clearInterval(timer);
	$("state").innerHTML="Memorize!";
	timer = setInterval(showToSelect, interval);
	var blocks = $$(".block");
	blocks[targetBlocks[0]].addClassName("target");
	blocks[targetBlocks[1]].addClassName("target");	
	blocks[targetBlocks[2]].addClassName("target");
}

function showToSelect(){
	clearInterval(timer);
	timer=setInterval(selectToResult,interval);
	$("state").innerHTML="Select!";
	var blocks = $$(".block");
	blocks[targetBlocks[0]].removeClassName("target");
	blocks[targetBlocks[1]].removeClassName("target");	
	blocks[targetBlocks[2]].removeClassName("target");
	for(var i=0;i<numberOfBlocks;i++){
		blocks[i].observe("click", function(){
			if(selectedBlocks.length < numberOfTarget){ //3개 이상선택 불가!
 				this.addClassName("selected");
				this.stopObserving();
				selectedBlocks.push(this.readAttribute("data-index")); //선택된 블락 넣기.
			}
		});
	}
	
}

function selectToResult(){
	var score=0;
	score=$("answer").innerHTML;
	var array = score.split("/");
	clearInterval(timer);
	timer=setInterval(startToSetTarget,interval);
	$("state").innerHTML="Checking!";
	var blocks = $$(".block");
	if(blocks[selectedBlocks[0]]!=null){
	blocks[selectedBlocks[0]].removeClassName("selected");}
	if(blocks[selectedBlocks[1]]!=null){
	blocks[selectedBlocks[1]].removeClassName("selected");}
	if(blocks[selectedBlocks[2]]!=null){
	blocks[selectedBlocks[2]].removeClassName("selected");}
	for(var i=0;i<numberOfBlocks;i++){
		blocks[i].stopObserving('click');
		
	}
	if((selectedBlocks[0]*1 == targetBlocks[0]) || (selectedBlocks[0]*1 == targetBlocks[1]) ||(selectedBlocks[0]*1 == targetBlocks[2]))
	{
		array[0]++;
	}
	if((selectedBlocks[1]*1 == targetBlocks[0]) || (selectedBlocks[1]*1 == targetBlocks[1]) ||(selectedBlocks[1]*1 == targetBlocks[2]))
	{
		array[0]++;
	}
	if((selectedBlocks[2]*1 == targetBlocks[0]) || (selectedBlocks[2]*1 == targetBlocks[1]) ||(selectedBlocks[2]*1 == targetBlocks[2]))
	{
		array[0]++;
	}
	array[1]=array[1]*1+3;
	$("answer").innerHTML=array[0]+"/"+array[1];
}