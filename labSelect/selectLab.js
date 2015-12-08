"use strict";
document.observe("dom:loaded", function() {
	/* Make necessary elements Dragabble / Droppables (Hint: use $$ function to get all images).
	 * All Droppables should call 'labSelect' function on 'onDrop' event. (Hint: set revert option appropriately!)
	 * 필요한 모든 element들을 Dragabble 혹은 Droppables로 만드시오 (힌트 $$ 함수를 사용하여 모든 image들을 찾으시오).
	 * 모든 Droppables는 'onDrop' 이벤트 발생시 'labSelect' function을 부르도록 작성 하시오. (힌트: revert옵션을 적절히 지정하시오!)
	 */
	
	var labs = $$("#labs img"); //위에있는것들
	var lists = $$("#selectpad img"); //아래있는것들
	
	for (var i=0;i<12;i++) {
  		new Draggable(labs[i],{revert: true});
	}
	
	for (var i=0;i<lists.length;i++) {
  		new Draggable(lists[i],{revert: true});
	}
	
    Droppables.add("selectpad", {onDrop: labSelect});
    
    Droppables.add("labs", {onDrop: function(drag,drop,event)
    {
    	var chk=0;
    	var labs = $$("#labs img");
    	for (var i=0;i<labs.length;i++){
    		if((labs[i].alt == drag.alt)){
    			chk=1; //자기들끼리 순서변경 안되게
    		}
    	}
    	if(chk==0){
    		drag.parentNode.removeChild(drag);
			drop.appendChild(drag);
    		var lists = $$("#selection > li");
			for(var i=0;i<lists.length;i++){
					if( drag.alt == lists[i].innerHTML){
						$("selection").removeChild(lists[i]);
					}
			}
		}
    }
    });
    
    
});

function labSelect(drag, drop, event) {
	var lists = $$("#selectpad img"); //밑에 있는거 개수세기
	var chk=0;
	for (var i=0;i<lists.length;i++){
		if(lists[i].alt == drag.alt){
			chk=1; //등록된게 또 등록안되게
		}
	}
	if(chk==0){
		if(lists.length<3){ 
			drag.parentNode.removeChild(drag);
			drop.appendChild(drag);
			var li = document.createElement("li");
			li.innerHTML = drag.alt;
			$("selection").appendChild(li);
			setTimeout(function(){$("selection").lastChild.pulsate({duration : 1.0});},500);
		}
	
	}
	
}

