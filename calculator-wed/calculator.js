"use strict"
window.onload = function () {
    var stack = [];
    var displayVal = "0";
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;
            if(0<=value && value<=9){
            	if(displayVal==0 && value!=0){
            		stack.push(value);
            		displayVal=value;
            		}
            	else if(displayVal==0 && value==0){
            	
            		}
            	else{
            		stack.push(value);
            		displayVal+=value;
            		}
            }
            else if(value=="AC"){
            	stack=[];
            	stack[0]=0;
            	displayVal=0;
            }
            else if(value=="."){
            	if(displayVal.indexOf(".")!=-1){
            	}
            	else{
            	stack.push(value);
            	displayVal+=value;
            	}
            }
            
            else if(value=="="){
            	displayVal=calculator(stack);
            	alert(stack);
            	document.getElementById('expression').innerHTML=0;
            	stack=[];
            
            }
            else{
            	if((value=="!") || (value=="^"))
            	{
            		if((stack[stack.length-1]=="!") || (stack[stack.length-1]=="^"))
            		{
						stack[stack.length-1]=value;
						displayVal=displayVal.slice(0,-1);
						displayVal+=value;      		
					}
					else
					{
						stack.push(value);
						displayVal+=value;
						
					}
            	}
            	else
            	{
            		stack.push(value);
            		displayVal+=value;
            		if(document.getElementById('expression').innerHTML==0){
            		document.getElementById('expression').innerHTML=displayVal;
            		}
            		else{
            		document.getElementById('expression').innerHTML+=displayVal;
            		}
            		displayVal=0;
            	}
            }
            
            document.getElementById('result').innerHTML = displayVal;
        };
    }
    
    
};
function factorial (x) {

}
function highPriorityCalculator(s, val) {

}
function calculator(s) {
    var result = 0;
    var operator = "+";
    //stack.indexOf
    for (var i=0; i< s.length; i++) {
    	if(0<=s[i] && s[i]<=9){
    		
    	}
    	else if(s[i]=="*"){
    	
    	
    	}
        else if(s[i]=="/"){
        
        
        }
        else if(s[i]=="^"){
        
        }
        else if(s[i]=="+" || s[i]=="-"){
        
        
        }
        
    }
    return result;
}
