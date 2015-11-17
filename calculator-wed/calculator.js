"use strict"
window.onload = function () {
    var stack = [];
    var temp="";
    var displayVal = "0";
    for (var i in $$('button')) {
        $$('button')[i].onclick = function () {
            var value = this.innerHTML;
            if(0<=value && value<=9){
            
            	if((stack[stack.length-1]=="!")&&(0<=value && value<=9)){
					
				}
					
				else{	
            	if(displayVal==0 && value!=0){
            		temp+=value;
            		console.log(temp);
            		displayVal=value;
            		}
            	else if(displayVal==0 && value==0){
            		
            		}
            	else{
            		temp+=value;
            		console.log(temp);
            		displayVal+=value;
            		}
            		}
            }
            else if(value=="AC"){
            	stack=[];
            	temp="";
            	displayVal=0;
            	document.getElementById('expression').innerHTML=0;
            }
            else if(value=="."){
            	if(displayVal.indexOf(".")!=-1){
            	}
            	else{
            	temp+=value;
            	displayVal+=value;
            	}
            }
            
            else if(value=="="){
            	if(temp!=""){
            	stack.push(temp);}
            	console.log(stack);
            	displayVal=calculator(stack);
            	temp="";
            	document.getElementById('expression').innerHTML=0;
            	stack=[];
            	document.getElementById('result').innerHTML = displayVal;
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
						stack.push(temp);
						stack.push(value);
						temp="";
						displayVal+=value;
						
					}
            	}
            	else
            	{
            		stack.push(temp);
            		temp="";
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
	var result=1;
	for(var i=x;i>0;i--){
		result=result*i;
	}
	return result;	

}
function highPriorityCalculator(s, val) {
	var s2=[];
		if(s[val]=="*"){
			s[val-1]=(s[val-1]*1)*(s[val+1]*1);
			s[val]=null;
			s[val+1]=null;
		}
		else if(s[val]=="/"){
			s[val-1]=(s[val-1]*1)/(s[val+1]*1);
			s[val]=null;
			s[val+1]=null;
		}
    	for(var i=0;i<s.length;i++){
    		if(s[i]!=null)
    		{
    			s2.push(s[i]);
    		}
    	}
	return s2;
}
function calculator(s) {

    var result = 0;
    var operator = "+";
    var s2=[];
    //3 * 3
     for(var i=0;i<s.length;i++){
   		if(s[i]=="^"){
   			s[i-1]=s[i-1]*1;
   			s[i+1]=s[i+1]*1;
    		for(var j=0;j<s[i+1]-1;j++){
    			s[i-1]=s[i-1]*s[i+1];
    		}
    		s[i]=null;
    		s[i+1]=null;
    		for(var j=0;j<s.length;j++){
    			if(s[j]!=null){
    				s2.push(s[j]);
    			}
    		}
    		
    	}	
    }
    s=s2;
    
    for (var i=0; i<s.length; i++) {
    	if((s[i]=="*") || (s[i]=="/")){
    		s=highPriorityCalculator(s,i);
    		i=0;
    	}
    }
   
    for(var i=s.length-1;i>=0;i--){
    	if(s[i]=="+"){
    		s[i-1]=(s[i-1]*1)+(s[i+1]*1);
    		s.pop();
    		s.pop();
    		}
    	else if(s[i]=="-"){
    		s[i-1]=(s[i-1]*1)-(s[i+1]*1);
    		s.pop();
    		s.pop();
    	}
    	
    	else if(s[i]=="!"){
    		s[i-1]=factorial(s[i-1]);
    		s.pop();
    	}
    	
    
    }
    result=s;
    //console.log(result);
    
    return result;
    
}
