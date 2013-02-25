 $(document).ready(function(){
                                           var tit="";
                                           $('.img_light').hover(function(e){
                                            e.preventDefault();
                                            tit=$(this).attr('alt');
                                            //code khi a:click hien tooltip
                                            $('.light_a').hide();
                                       	    
                                       	   },function(){
                                       	   	 $('.light_a').hide();
                                       	   	 
                                       	   }).mousemove(function(e){
                                       	   	var mousex = e.pageX +20;
        									var mousey = e.pageY;
                                       	    $('#light_a_'+tit).css({'display':'block','top':mousey,'left':mousex});
                                       	    
                                       	   });
                                          
                                          
                                          
                                           
 });       