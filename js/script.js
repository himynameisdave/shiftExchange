//	Written by Dave Lunny

function		init()		{
	
	$('#menuBtn').bind('click',menuDown);	
	
	$('#postClicker').bind('click',showPostShift);

	$('#registerClick').bind('click',showRegister);
	
	$(window).resize(function() {
		
		if( $(window).width() >= 785){
			
			$('#profile').removeClass('bounceOutUp');
			$('#profile').css('display','block');
			
		}else if( $(window).width() < 785 ){
			
			if( !isMenuDown ){
				$('#profile').css('display','none');
			} 
			
		};//
		
	});
	
	//	Starting our datepicker
	$( "#pickDate" ).datepicker({
		inline: true
	});
	
	
	
};//	End init function

function	menuDown() { 		
		$('#profile').css('display','block');
		
		isMenuDown = true;
		
		$('#profile').removeClass('bounceOutUp');
		$('#profile').addClass('bounceInDown');
		
	/*	$('#menuPlus').removeClass('rotateBack');		
		$('#menuPlus').addClass('rotateForward');	*/
		
		$('#menuBtn').unbind('click',menuDown);
		
		$('#menuBtn').bind('click',menuUp);
		
};//End menuDown function

	
	
function	menuUp()	{
			
	$('#profile').removeClass('bounceInDown');
	$('#profile').addClass('bounceOutUp');
	
/*	$('#menuPlus').removeClass('rotateForward');		
		$('#menuPlus').addClass('rotateBack');	*/
	
	setTimeout(function(){
		$('#profile').css('display','none');
		isMenuDown = false;
	}, 500)
	
	$('#menuBtn').unbind('click',menuUp);
	
	$('#menuBtn').bind('click',menuDown);
	
};//End menuUp function



function	showPostShift()		{
	
	$('#postClicker').unbind('click',showPostShift);
	
	$('#postShift').css('display','block');
	$('#postShift').addClass('fadeIn');
	setTimeout(function(){
	
		$('#postShift').removeClass('fadeIn')
		
	}, 1000);
	
	
};//	End showPostShift


function	showRegister()		{
	
	$('#registerClick').unbind('click',showRegister);

	$('#register').css('display','block');
	$('#register').addClass('fadeIn');
	setTimeout(function(){
	
		$('#register').removeClass('fadeIn')
		
	}, 1000);
	
	
};//	End of shoRegister function



var isMenuDown = false;


$(document).ready(init);