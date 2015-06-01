<?php
function get_youtube_thumb_id_from_url($url){						
						if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
							return $match[1];
						}
					}
function front_end_video_player($videos, $paramssld, $video_player)
{

 ob_start();
	$video_playerID=$video_player[0]->id;
	$video_playertitle=$video_player[0]->name;
	$video_playeralbum=$video_player[0]->album_single;
	$path_site = plugins_url("../images", __FILE__);
?>
<?php	switch($video_playeralbum){
		case 'single':
?>
<script>
	jQuery(document).ready(function(){
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	});
	
	function onYouTubeIframeAPIReady(){
		<?php
		$j=0;
		foreach($videos as $video){
			$video_thumb_url=get_youtube_thumb_id_from_url($video->video_url_1);
		?>
		var yt_player_<?php echo $video->id; ?>;
		yt_player_<?php echo $video->id; ?> = new YT.Player('yt_player_<?php echo $video->id; ?>',{
			width		: '<?php echo $video_player[0]->width; ?>',
			height		: '<?php echo floor($video_player[0]->width*0.56); ?>',
			videoId		: '<?php echo $video_thumb_url; ?>',
			playerVars:{
				'autohide':			<?php echo $paramssld['video_pl_yt_autohide']; ?>,
				'autoplay':			<?php if($j==0){ echo $video_player[0]->autoplay; }else{ echo 0; } ?>,
				'controls': 		1,
				'fs':				<?php echo $paramssld['video_pl_yt_fullscreen']; ?>,
				'disablekb':		0,
				'modestbranding':	1,
				'enablejsapi': 1,
				// 'cc_load_policy': 1, // forces closed captions on
				'iv_load_policy':	<?php echo $paramssld['video_pl_yt_annotation']; ?>, // annotations, 1=on, 3=off
				// 'playlist': videoID, videoID, videoID, etc,
				'rel':				1,
				'showinfo':			<?php echo $paramssld['video_pl_yt_showinfo']; ?>,
				'theme':			'<?php echo $paramssld['video_pl_yt_theme']; ?>',	// dark, light
				'color':			'<?php echo $paramssld['video_pl_yt_color']; ?>'	// red, white
				},
			events:{
				'onReady': onPlayerReady,
				'onPlaybackQualityChange': onPlayerPlaybackQualityChange,
				'onPlaybackRateChange' : onPlaybackRateChange,
				'onStateChange': onPlayerStateChange,
				'onError': onPlayerError
				}
			});
		<?php
		$j++;
		}
		?>
		}
	
	function onPlayerError(){
		console.log("Youtube Player Error!");
	}
	
	function onPlayerReady(data){
		} // END FUNCTION
	
	function onPlayerPlaybackQualityChange(quality){
		} // END FUNCTION
		
	function onPlaybackRateChange(rate){
		} // END FUNCTION
	
	function onPlayerStateChange(state){
		switch(state.data){
			case -1: //unstarted
				/* do something */
				break;
			case 0: // ended
				
				break;
			case 1: // playing
				
				break;
			case 2: // paused
				break;
			case 3: // buffering
				/* do something */
				break;
			case 5: // video cued
				/* do something */
				break;
			default:
				// do nothing
			}
		} // END FUNCTION

		
	
	
</script>
<?php
$j=0;
 foreach($videos as $video){
		$video_playeralbum = $video->sl_type;
		switch($video_playeralbum){
		case 'video':
		$i=rand(1,1000);
?>
<script type="text/javascript">
var oldvolume<?php echo $i; ?>,videowidth<?php echo $i; ?>, videoheight<?php echo $i; ?>, tracks_buttons<?php echo $i; ?>, vidbox<?php echo $i; ?>, vid<?php echo $i; ?>, playbtn<?php echo $i; ?>, centerbtn<?php echo $i; ?>, centerwaiting<?php echo $i; ?>, slidebox<?php echo $i; ?>, durationbar<?php echo $i; ?>,curentslider<?php echo $i; ?>, bufferslide<?php echo $i; ?>, seekslider<?php echo $i; ?>, progressbar<?php echo $i; ?>, curtimetext<?php echo $i; ?>, durtimetext<?php echo $i; ?>, mutebtn<?php echo $i; ?>,volume_before<?php echo $i; ?>, volume_current<?php echo $i; ?>, volumebox<?php echo $i; ?>, fullscreenbtn<?php echo $i; ?>;
function initializePlayer<?php echo $i; ?>(){
	oldvolume=0.5;
	// SET OBJECT LISTENERS
	vidbox<?php echo $i; ?> = document.getElementById("player_container<?php echo $i; ?>");
	vid<?php echo $i; ?>=document.getElementById("my_video<?php echo $i; ?>");
	videowidth<?php echo $i; ?>=vid<?php echo $i; ?>.offsetWidth;
	videoheight<?php echo $i; ?>=vid<?php echo $i; ?>.offsetHeight;
	
	playbtn<?php echo $i; ?>=document.getElementById("PlayPause<?php echo $i; ?>btn<?php echo $i; ?>");
	fast_back<?php echo $i; ?>=document.getElementById("fast_back<?php echo $i; ?>");
	fast_forward<?php echo $i; ?>=document.getElementById("fast_forward<?php echo $i; ?>");
	centerbtn<?php echo $i; ?>=document.getElementById("centerPlayPause<?php echo $i; ?>");
	centerwaiting<?php echo $i; ?>=document.getElementById("centerwaiting<?php echo $i; ?>");
	slidebox<?php echo $i; ?>=document.getElementById("video_duration_slide<?php echo $i; ?>");
	durationbar<?php echo $i; ?>=document.getElementById("durationbar<?php echo $i; ?>");
	seekslider<?php echo $i; ?>=document.getElementById("seekslider<?php echo $i; ?>");
	curentslider<?php echo $i; ?>=document.getElementById("curentslider<?php echo $i; ?>");
	bufferslide<?php echo $i; ?>=document.getElementById("bufferslide<?php echo $i; ?>");
	progressbar<?php echo $i; ?>=document.getElementById("progressbar<?php echo $i; ?>");
	curtimetext<?php echo $i; ?>=document.getElementById("curtimetext<?php echo $i; ?>");
	durtimetext<?php echo $i; ?>=document.getElementById("durtimetext<?php echo $i; ?>");
	mutebtn<?php echo $i; ?>=document.getElementById("mutebtn<?php echo $i; ?>");
	volumebox<?php echo $i; ?>=document.getElementById("volume<?php echo $i; ?>");
	volume_current<?php echo $i; ?>=document.getElementById("volume_current<?php echo $i; ?>");
	volume_before<?php echo $i; ?>=document.getElementById("volume_before<?php echo $i; ?>");
	fullscreenbtn<?php echo $i; ?>=document.getElementById("fullscreenbtn<?php echo $i; ?>");
	
	// ADD EVENT LISTENERS
	loadVideo<?php echo $i; ?>();
	
	vidbox<?php echo $i; ?>.addEventListener("mouseover",showProgressBar<?php echo $i; ?>,false);
	vidbox<?php echo $i; ?>.addEventListener("mouseout",hideProgressBar<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("canplay",notWaiting<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("ended",vidEnd<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("resize",changeSizes<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("playing",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("loadeddata",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("canplaythrough",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("progress",progressHandler<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("waiting",waiting<?php echo $i; ?>,false);
	
	
	
	centerbtn<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	playbtn<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	fast_back<?php echo $i; ?>.addEventListener("click",fastBack<?php echo $i; ?>,false);
	fast_forward<?php echo $i; ?>.addEventListener("click",fastForward<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("dblclick",toggleFullScreen<?php echo $i; ?>,false);
	
	
	var drag;
	slidebox<?php echo $i; ?>.addEventListener("mousedown",function(e){
		drag=1;
		vidSeeking<?php echo $i; ?>(e);
	},false);
	window.addEventListener("mousemove",function(e){
		if(drag==1){
			vid<?php echo $i; ?>.pause();
			vidSeeking<?php echo $i; ?>(e);
		}
	},false);
	window.addEventListener("mouseup",function(){
		if(drag==1){
			vid<?php echo $i; ?>.play();
			centerbtn<?php echo $i; ?>.style.display="none";
			drag="";
		}
	})
	
	vid<?php echo $i; ?>.addEventListener("timeupdate",function(){
		if(drag!=1){
			seektimeupdate<?php echo $i; ?>();
		}
	},false);
	
	slidebox<?php echo $i; ?>.addEventListener("mousemove",timerDisplay<?php echo $i; ?>,false);
	slidebox<?php echo $i; ?>.addEventListener("mouseout",timerNotDisplay<?php echo $i; ?>,false);
	mutebtn<?php echo $i; ?>.addEventListener("click",vidmute<?php echo $i; ?>,false);
	
	var dragvol;
	volumebox<?php echo $i; ?>.addEventListener("mousedown",function(e){
		dragvol=1;
		setVolume<?php echo $i; ?>(e);
	},false);
	window.addEventListener("mousemove",function(e){
		if(dragvol==1){
			setVolume<?php echo $i; ?>(e);
		}
	},false);
	window.addEventListener("mouseup",function(){
		if(dragvol==1){
			dragvol="";
		}
	})
	
	fullscreenbtn<?php echo $i; ?>.addEventListener("click",toggleFullScreen<?php echo $i; ?>,false);
	vidbox<?php echo $i; ?>.addEventListener("mouseover",function(){
		window.addEventListener("keydown",keyFunction<?php echo $i; ?>,false);
	},false)
	
	vidbox<?php echo $i; ?>.addEventListener("mouseout",function(){
		window.removeEventListener("keydown",keyFunction<?php echo $i; ?>,false);
	},false)
	
	vidbox<?php echo $i; ?>.addEventListener('webkitfullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('mozfullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('fullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('MSFullscreenChange', exitHandler<?php echo $i; ?>, false);
	
	jQuery(window).on("resize",function(){
		adjustWidthHeights<?php echo $i; ?>();
	});
	
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},200);
	//*******************************************
  
}

	


function adjustWidthHeights<?php echo $i; ?>(){
	var w=<?php echo $video_player[0]->width; ?>; 
	if(jQuery("#player_container<?php echo $i; ?>").parent().width()<w){
		vidbox<?php echo $i; ?>.style.width="100%";
		var vh=vid<?php echo $i; ?>.offsetHeight;
		var vhb=vh+30;
		vidbox<?php echo $i; ?>.style.height=vhb+"px";
		document.getElementById("video_player<?php echo $i; ?>").style.height=vh+"px";
	}else{
		vidbox<?php echo $i; ?>.style.width="<?php echo $video_player[0]->width; ?>px";
		var vh=vid<?php echo $i; ?>.offsetHeight;
		var vhb=vh+30;
		
		vidbox<?php echo $i; ?>.style.height=vhb+"px";
		document.getElementById("video_player<?php echo $i; ?>").style.height=vh+"px";
	}
}

function changeSizes<?php echo $i; ?>(){
	videoheight=vid<?php echo $i; ?>.offsetHeight;
	videowidth=<?php echo $video_player[0]->width; ?>;
	hb=videoheight+30;
	document.getElementById("video_player<?php echo $i; ?>").style.height = videoheight+"px";
	document.getElementById("player_container<?php echo $i; ?>").style.height = hb+"px";
}
  
function exitHandler<?php echo $i; ?>(){                                   
  //NB the following line requrires the libary from John Dyer                         
 if (isFullScreen<?php echo $i; ?>())
	 console.log("");
   // nothing:)))
else
	 cFullScreen<?php echo $i; ?>();                                                             
} 


function loadVideo<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.autoplay){
		playbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-pause"></i>';
		centerbtn<?php echo $i; ?>.style.display="none";
	}else{
		playbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-play"></i>';
		centerbtn<?php echo $i; ?>.style.display="block";
		centerwaiting<?php echo $i; ?>.style.display="none";
	}
	var durmins = Math.floor(vid<?php echo $i; ?>.duration / 60);
	var dursecs = Math.floor(vid<?php echo $i; ?>.duration - durmins * 60);
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(durmins < 10){ durmins = "0"+durmins; }
	durtimetext<?php echo $i; ?>.innerHTML = "--";
	curtimetext<?php echo $i; ?>.innerHTML = "--";
	setTimeout(function(){
		videoheight =vid<?php echo $i; ?>.offsetHeight;
		var hb = videoheight+30;
		document.getElementById("video_player<?php echo $i; ?>").style.height = videoheight+"px";
		document.getElementById("player_container<?php echo $i; ?>").style.height = hb+"px";
	},250);
	
}

function fastBack<?php echo $i; ?>(){
	var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
	if(p>0){
		var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)-15)/100);
		vid<?php echo $i; ?>.currentTime = seekto;
	}
}

function fastForward<?php echo $i; ?>(){
	var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
	if(p<100){
		var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)+15)/100);
		vid<?php echo $i; ?>.currentTime = seekto;
	}
}

function showProgressBar<?php echo $i; ?>(){
	curentslider<?php echo $i; ?>.style.transform  = "scale(1,1)";
	curentslider<?php echo $i; ?>.style.top  = "-4px";
	durationbar<?php echo $i; ?>.style.height = "8px";
	durationbar<?php echo $i; ?>.style.bottom = "0px";
	seekslider<?php echo $i; ?>.style.height = "8px";
	seekslider<?php echo $i; ?>.style.bottom = "0px";
	bufferslide<?php echo $i; ?>.style.height = "8px";
	bufferslide<?php echo $i; ?>.style.bottom = "0px";
}

function hideProgressBar<?php echo $i; ?>(){
	curentslider<?php echo $i; ?>.style.transform  = "scale(0,0)";
	curentslider<?php echo $i; ?>.style.top  = "-2px";
	durationbar<?php echo $i; ?>.style.height = "3px";
	durationbar<?php echo $i; ?>.style.bottom = "0px";
	seekslider<?php echo $i; ?>.style.height = "3px";
	seekslider<?php echo $i; ?>.style.bottom = "0px";
	bufferslide<?php echo $i; ?>.style.height = "3px";
	bufferslide<?php echo $i; ?>.style.bottom = "0px";
}

function waiting<?php echo $i; ?>(){
	centerwaiting<?php echo $i; ?>.style.display="block";
	centerbtn<?php echo $i; ?>.style.display="none";
}

function notWaiting<?php echo $i; ?>(){
	centerwaiting<?php echo $i; ?>.style.display="none";
}



function progressHandler<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.buffered.length > 0){
		var i=vid<?php echo $i; ?>.buffered.length
		var percent=(vid<?php echo $i; ?>.buffered.end(i-1)/vid<?php echo $i; ?>.duration)*100;
		var dw=durationbar<?php echo $i; ?>.offsetWidth;
		bufferslide<?php echo $i; ?>.style.width=Math.floor((dw*percent)/100)+"px";
			
	}
	
}
function PlayPause<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.paused){
		vid<?php echo $i; ?>.play();
		playbtn<?php echo $i; ?>.innerHTML = '<i class="hugeicons hugeicons-pause"></i>';
		centerbtn<?php echo $i; ?>.style.display="none";
	}else{
		vid<?php echo $i; ?>.pause();
		playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-play"></i>';
		centerbtn<?php echo $i; ?>.style.display="block";
		centerwaiting<?php echo $i; ?>.style.display="none";
	}
}
function vidEnd<?php echo $i; ?>(){
	playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-refresh"></i>';
	centerbtn<?php echo $i; ?>.style.display="block";
}


function mouseDown<?php echo $i; ?>(){
	slidebox<?php echo $i; ?>.addEventListener('mousemove', vidSeek, false);
}

function vidSeeking<?php echo $i; ?>(e){
	var x = e.clientX;
	var l=document.getElementById("player_container<?php echo $i; ?>").getBoundingClientRect().left;
	var pos = x-l;
	//var pospercent= Math.round((pos/sw)*100);
	var cw = curentslider<?php echo $i; ?>.offsetWidth;
	seekslider<?php echo $i; ?>.style.width = pos+"px";
	curentslider<?php echo $i; ?>.style.left = pos-cw/2+"px";
	var sw = seekslider<?php echo $i; ?>.offsetWidth;
	var dw= durationbar<?php echo $i; ?>.offsetWidth;
	var percent = Math.floor((sw/dw)*100);
	var seekto=Math.floor(vid<?php echo $i; ?>.duration*(percent/100));
	vid<?php echo $i; ?>.currentTime = seekto;
}
    
function vidSeek(){
	
}

function timerDisplay<?php echo $i; ?>(e){
	if(vid<?php echo $i; ?>.buffered.length > 0){
		var x = e.clientX;
		var l=document.getElementById("player_container<?php echo $i; ?>").getBoundingClientRect().left;
		var w=document.getElementById("timer_display<?php echo $i; ?>").offsetWidth;
		var sw=durationbar<?php echo $i; ?>.offsetWidth;
		var pos = x-l;
		var pospercent= Math.round((pos/sw)*100);
		var posTime=vid<?php echo $i; ?>.duration*(pospercent/100);
		var curmins = Math.floor(posTime / 60);
		var cursecs = Math.floor(posTime - curmins * 60);
		if(cursecs < 10){ cursecs="0"+cursecs; }
		if(curmins < 10){ curmins="0"+curmins; }
		document.getElementById("timer_display<?php echo $i; ?>").style.display = "block";
		document.getElementById("timer_display<?php echo $i; ?>").style.left = x-l-w/2+"px";
		document.getElementById("ttd<?php echo $i; ?>").innerHTML = curmins+":"+cursecs;
	}
}
function timerNotDisplay<?php echo $i; ?>(){
	document.getElementById("timer_display<?php echo $i; ?>").style.display = "none ";
	document.getElementById("timer_display<?php echo $i; ?>").style.left = "0px";
}
function seektimeupdate<?php echo $i; ?>(){
	var nt = vid<?php echo $i; ?>.currentTime*(100/vid<?php echo $i; ?>.duration);
	var dw=durationbar<?php echo $i; ?>.offsetWidth;
	var cw = curentslider<?php echo $i; ?>.offsetWidth;
	seekslider<?php echo $i; ?>.style.width=Math.floor((nt*dw)/100)+"px";
	curentslider<?php echo $i; ?>.style.left=Math.floor((nt*dw)/100)-cw/2+"px";
	var curmins = Math.floor(vid<?php echo $i; ?>.currentTime / 60);
	var cursecs = Math.floor(vid<?php echo $i; ?>.currentTime - curmins * 60);
	var durmins = Math.floor(vid<?php echo $i; ?>.duration / 60);
	var dursecs = Math.floor(vid<?php echo $i; ?>.duration - durmins * 60);
	if(cursecs < 10){ cursecs = "0"+cursecs; }
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(curmins < 10){ curmins = "0"+curmins; }
	if(durmins < 10){ durmins = "0"+durmins; }
	curtimetext<?php echo $i; ?>.innerHTML = curmins+":"+cursecs;
	durtimetext<?php echo $i; ?>.innerHTML = durmins+":"+dursecs;
}

function vidmute<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.muted){
		vid<?php echo $i; ?>.muted = false;
		mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
		var volboxw=volumebox<?php echo $i; ?>.offsetWidth;
		volume_before<?php echo $i; ?>.style.width=Math.floor(oldvolume*volboxw)+"px";
		var l = Math.floor(oldvolume*volboxw)-volume_current<?php echo $i; ?>.style.width;
		
		volume_current<?php echo $i; ?>.style.left=l+"px";
	}else{
		var volbefw=volume_before<?php echo $i; ?>.offsetWidth;
		var volboxw=volumebox<?php echo $i; ?>.offsetWidth;
		oldvolume=volbefw/volboxw;
		vid<?php echo $i; ?>.muted = true;
		mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
		volume_before<?php echo $i; ?>.style.width="0px";
		volume_current<?php echo $i; ?>.style.left="0px";
	}
}
function setVolume<?php echo $i; ?>(e){
	var x = e.clientX;
	var l=volumebox<?php echo $i; ?>.getBoundingClientRect().left;
	var pos = x-l;
	var cw=volume_current<?php echo $i; ?>.offsetWidth;
	if(pos>=0 && pos<=volumebox<?php echo $i; ?>.offsetWidth){
		volume_before<?php echo $i; ?>.style.width=pos+"px";
		volume_current<?php echo $i; ?>.style.left = pos+"px";
		var sw=volume_before<?php echo $i; ?>.offsetWidth;
		var bw=volumebox<?php echo $i; ?>.offsetWidth;
		var p = Math.floor((sw/bw)*100);
		oldvolume=p/100;
		vid<?php echo $i; ?>.volume=p/100;
		if(p<70){
			if(p==0){
				mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
			}else{
				mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
			}
		}else{
			mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
		}
	}
	
}
function toggleFullScreen<?php echo $i; ?>(){
	ff<?php echo $i; ?>(vidbox<?php echo $i; ?>);
}
function ff<?php echo $i; ?>(element)
{
    if (isFullScreen<?php echo $i; ?>())
        cFullScreen<?php echo $i; ?>();
    else
        requestFullScreen<?php echo $i; ?>(element || document.documentElement);
}
function isFullScreen<?php echo $i; ?>()
{
    return (document.fullScreenElement && document.fullScreenElement !== null)
         || document.mozFullScreen
         || document.webkitIsFullScreen;
}
function requestFullScreen<?php echo $i; ?>(element)
{
    if (element.requestFullscreen)
        element.requestFullscreen();
    else if (element.msRequestFullscreen)
        element.msRequestFullscreen();
    else if (element.mozRequestFullScreen)
        element.mozRequestFullScreen();
    else if (element.webkitRequestFullscreen)
        element.webkitRequestFullscreen();
	setTimeout(function(){
		vidbox<?php echo $i; ?>.style.width="100%";
		vidbox<?php echo $i; ?>.style.height="100%";
		document.getElementById("video_player<?php echo $i; ?>").style.width="100%";
		document.getElementById("video_player<?php echo $i; ?>").style.height="100%";
		vid<?php echo $i; ?>.style.width="100%";
		vid<?php echo $i; ?>.style.height="100%";
	},300);
	
	fullscreenbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-compress"></i>';
}

function cFullScreen<?php echo $i; ?>()
{
    if (document.exitFullscreen)
        document.exitFullscreen();
    else if (document.msExitFullscreen)
        document.msExitFullscreen();
    else if (document.mozCancelFullScreen)
        document.mozCancelFullScreen();
    else if (document.webkitExitFullscreen)
        document.webkitExitFullscreen();
	vid<?php echo $i; ?>.style.width="100%";
	vid<?php echo $i; ?>.style.height="auto";
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},100)
	
	
	fullscreenbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-expand"></i>';
}

function keyFunction<?php echo $i; ?>(e){
	switch(e.keyCode){
		case 40:
			var lw=volume_current<?php echo $i; ?>.offsetLeft;
			var bw=volumebox<?php echo $i; ?>.offsetWidth;
			var val = Math.floor((lw/bw)*100);
			if(val>0){
				var p =val-10;
				if(p<0){
					p=0;
				}
				volume_before<?php echo $i; ?>.style.width=bw*(p/100)+"px";
				volume_current<?php echo $i; ?>.style.left=bw*(p/100)+"px";
				vid<?php echo $i; ?>.volume=p/100;
				if(p<70){
					if(p==0){
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
					}else{
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
					}
				}else{
					mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
				}
			}
			e.preventDefault();
			break;
		case 38:
			var lw=volume_current<?php echo $i; ?>.offsetLeft;
			var bw=volumebox<?php echo $i; ?>.offsetWidth;
			var val = Math.floor((lw/bw)*100);
			if(val<100){
				var p =val+10;
				if(p>100){
					p=100;
				}
				volume_before<?php echo $i; ?>.style.width=bw*(p/100)+"px";
				volume_current<?php echo $i; ?>.style.left=bw*(p/100)+"px";
				vid<?php echo $i; ?>.volume=p/100;
				if(p<70){
					if(p==0){
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
					}else{
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
					}
				}else{
					mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
				}
			}
			e.preventDefault();
			break;
		case 39:
			var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
			if(p!=100){
				var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)+15)/100);
				vid<?php echo $i; ?>.currentTime = seekto;
			}
			e.preventDefault();
			break;
		case 37:
			var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
			if(p!=0){
				var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)-15)/100);
				vid<?php echo $i; ?>.currentTime = seekto;
			}
			
			e.preventDefault();
			break;
		case 32:
			if ("createEvent" in document) {
				var evt = document.createEvent("HTMLEvents");
				evt.initEvent("click", false, true);
				playbtn<?php echo $i; ?>.dispatchEvent(evt);
			}
			else
				playbtn<?php echo $i; ?>.fireEvent("onclick");
			e.preventDefault();
			break;
	}
}
jQuery(document).ready(function(){
	initializePlayer<?php echo $i; ?>();
})
</script>
<style>

#player_container<?php echo $i; ?> {
	<?php
	switch($paramssld['video_pl_position']){
		case "left":
			?>
			float:left;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			<?php
			break;
		case "right":
			?>
			float:right;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			<?php
			break;
		case "center":
			?>
			margin:0px auto;
			<?php
			break;
	}
	?> 
	margin-top:<?php echo $paramssld['video_pl_margin_top']; ?>px;
	margin-bottom:<?php echo $paramssld['video_pl_margin_bottom'] ?>px;
	position:relative;
	width:<?php echo $video_player[0]->width; ?>px;
	overflow:hidden;
	background:#<?php echo $paramssld['video_pl_background_color']; ?>;
	border:<?php echo $paramssld['video_pl_border_size']; ?>px solid #<?php echo $paramssld['video_pl_border_color']; ?>;
	font-size:12px !important;
	font-weight:normal !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#player_container<?php echo $i; ?> button {
	color:#<?php echo $paramssld['video_pl_buttons_color']; ?> !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#player_container<?php echo $i; ?> button:hover {
	color:#<?php echo $paramssld['video_pl_buttons_hover_color']; ?> !important;
}


div#video_player_box input<?php echo $i; ?>:focus {
	outline:none;
	box-shadow:none;
	border:0;
}

#video_player<?php echo $i; ?> {
	width:100%;
	position: absolute;
	overflow:hidden;
	bottom: 30px;
}

#my_video<?php echo $i; ?> {
	position:absolute;
	width:100%;
	height:auto;
	outline: 0;
	left: 0px;
	top: 0px;
	transform: none;
	opacity: 1;
	background:transparent url('<?php echo $video->image_url; ?>') no-repeat center center; 
   -webkit-background-size:cover; 
   -moz-background-size:cover; 
   -o-background-size:cover; 
   background-size:cover; 
}

div#video_duration_slide<?php echo $i; ?> { 
	width: 100%;
	height: 8px;
	padding: 0px;
	background: none;
	position: absolute;
	bottom: 27px;
}

#durationbar<?php echo $i; ?> {
	position:absolute;
	bottom:0px;
	left:0px;
	width:100%;
	height:8px;
	background:#<?php echo $paramssld['video_pl_timeline_background']; ?>;
	transition: height 1s ease;
}

#seekslider<?php echo $i; ?> {
	position: absolute;
	bottom: 0px;
	left:0px;
	display: block;
	width:1px;
	height:8px;
	background: #<?php echo $paramssld['video_pl_timeline_color']; ?>;
	content: '';
	z-index:4;
	transition: height 1s ease;
}

#curentslider<?php echo $i; ?> {
	position: absolute;
	top:-4px;
	left:0px;
	height:15px;
	width:15px;
	border-radius:100%;
	background:#<?php echo $paramssld['video_pl_timeline_slider_color']; ?>;
	z-index:5;
	cursor:pointer;
	transition:transform 1s ease;
}

#curentslider<?php echo $i; ?>:focus {
	cursor:pointer;
}


#bufferslide<?php echo $i; ?> {
	position: absolute;
	bottom:0px;
	display: block;
	width:1px;
	height:8px;
	content: '';
	background: #<?php echo $paramssld['video_pl_timeline_buffering_color']; ?>;
	left: 3px;
	transition: height 1s ease;
}

#timer_display<?php echo $i; ?> {
	position:absolute;
	display:none;
	left:0px;
	top:-31px;
	min-width:30px;
	padding:5px;
	background: #444;
	border:none;
	font-size: 12px;
	color:#fff;
	z-index: 5;
	text-align: center;
}

#pnt<?php echo $i; ?> {
	position:absolute;
	left:50%;
	top:20px;
	width: 10px;
	height: 10px;
	margin-left:-5px;
	-ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform:rotate(45deg);
	background:#444;
}

div#video_controls_bar<?php echo $i; ?> {
	position: absolute;
	background: none repeat scroll 0% 0% #<?php echo $paramssld['video_pl_controls_panel_color']; ?>;
	height: 27px;
	bottom: 0px;
	width: 100%;
	padding: 0px;
}

div#video_controls_bar<?php echo $i; ?> button {
	float:left;
	background:none;
	border:0;
	box-shadow:none;
	font-size:14px;
	cursor:pointer;
	padding:0px;
	margin:0px 5px 0px 5px;
	line-height:27px;
}

div#video_controls_bar<?php echo $i; ?> button:focus {
	box-shadow:none;
	outline:none;
}

#time_display<?php echo $i; ?> {
	position:relative;
	float:left;
	padding-left:10px;
	line-height:27px;
	font-size:11px;
}



#volume<?php echo $i; ?> { 
	position:relative;
	float:left;
	width:60px;
	height:27px;
	background:none;
	cursor:pointer;
}

#volume_before<?php echo $i; ?> {
	position:absolute;
	top:10px;
	left:0px;
	height:5px;
	width:30px;
	background:#<?php echo $paramssld['video_pl_timeline_color']; ?>;
	z-index:40;
}

#volume_current<?php echo $i; ?> {
	position:absolute;
	top:5px;
	left:30px;
	height:15px;
	width:5px;
	background:#<?php echo $paramssld['video_pl_timeline_slider_color']; ?>;
	z-index:41;
}

#volume_after<?php echo $i; ?> {
	position:absolute;
	top:10px;
	left:0px;
	height:5px;
	width:60px;
	background:#<?php echo $paramssld['video_pl_timeline_buffering_color']; ?>;
	z-index:39;
}

#mutebtn<?php echo $i; ?> { float:left;width:15px; }

#fullscreenbtn<?php echo $i; ?> { float:right !important; }


#curtimetext<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_curtime_color']; ?>; }

#time_separator<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_durtime_color']; ?>; }

#durtimetext<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_durtime_color']; ?>; }

#centerPlayPause<?php echo $i; ?> {
	display:block;
	position:absolute;
	top:50%;
	left:50%;
	margin:-33px 0px 0px -38px;
	width:66px;
	height:77px;
	
}

#centerPlayPausebtn<?php echo $i; ?> {
	width:66px;
	height:77px;
	background:none;
	border:0;
	box-shadow:none;
	font-size:77px;
	cursor:pointer;
	padding:0;
	line-height:0;
	opacity:0.7;
}

#centerwaiting<?php echo $i; ?> {
	position:absolute;
	display:none;
	top:50%;
	left:50%;
	margin:-14px 0px 0px -14px;
	width:28px;
	height:28px;
	background:none;
	border:0;
	box-shadow:none;
	color:#8e8e8e;
	font-size:28px;
	cursor:pointer;
	padding:0;
	line-height:0;
}



#centerPlayPause<?php echo $i; ?>btn<?php echo $i; ?>:focus {
	box-shadow:none;
	outline:none;
}

</style>
<div id="player_container<?php echo $i; ?>">
	<div id="video_player<?php echo $i; ?>">
		<video id="my_video<?php echo $i; ?>" src="<?php echo $video->video_url_1;  ?>" <?php if($j==0 && $video_player[0]->autoplay==1){ echo 'autoplay="true"'; } ?> <?php if($video_player[0]->preload==0){ echo 'preload="none"'; } ?> >
		Your browser does not support HTML5 video.
		</video>
	</div>
		<div id="video_duration_slide<?php echo $i; ?>" >
			<div id="durationbar<?php echo $i; ?>"></div>
			<div id="seekslider<?php echo $i; ?>"></div>
			<div id="curentslider<?php echo $i; ?>"></div>
			<div id="bufferslide<?php echo $i; ?>"></div>
			<div id="timer_display<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false">
				<span id="ttd<?php echo $i; ?>"></span>
				<span id="pnt<?php echo $i; ?>"></span>
			</div>
		</div>
		<div id="centerPlayPause<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false">
			<button id="centerPlayPausebtn<?php echo $i; ?>"><i class="hugeicons hugeicons-play-circle-o"></i></button>
		</div>
		<div id="centerwaiting<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false">
			<i class="hugeicons hugeicons-spinner hugeicons-pulse"></i>
		</div>
		<div id="video_controls_bar<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false">
			<button id="fast_back<?php echo $i; ?>"><i class="hugeicons hugeicons-backward"></i></button>
			<button id="PlayPause<?php echo $i; ?>btn<?php echo $i; ?>" ><i class="hugeicons hugeicons-play"></i></button>
			<button id="fast_forward<?php echo $i; ?>"><i class="hugeicons hugeicons-forward"></i></button>
			<button id="mutebtn<?php echo $i; ?>"><i class="hugeicons hugeicons-volume-up"></i></button>
			<div id="volume<?php echo $i; ?>">
				<div id="volume_before<?php echo $i; ?>"></div>
				<div id="volume_current<?php echo $i; ?>"></div>
				<div id="volume_after<?php echo $i; ?>"></div>
			</div>
			<div id="time_display<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false">
				<span id="curtimetext<?php echo $i; ?>"></span><span id="time_separator<?php echo $i; ?>"> / </span><span id="durtimetext<?php echo $i; ?>"></span>
			</div>
			<button id="fullscreenbtn<?php echo $i; ?>"><i class="hugeicons hugeicons-expand"></i></button>
		</div>
</div>
<?php
break;
case 'youtube':
$i=rand(1,1000);
?>
<script>
	jQuery(document).ready(function(){
		function ythw<?php echo $i; ?>(){
			var w=<?php echo $video_player[0]->width; ?>;
			if(jQuery("#yt_player_<?php echo $video->id; ?>").parent().width()<w){
				document.getElementById("yt_player_<?php echo $video->id; ?>").style.width="100%";
				var w=document.getElementById("yt_player_<?php echo $video->id; ?>").offsetWidth;
				document.getElementById("yt_player_<?php echo $video->id; ?>").style.height=w*0.56+"px";
			}else{
				document.getElementById("yt_player_<?php echo $video->id; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("yt_player_<?php echo $video->id; ?>").style.height="<?php echo $video_player[0]->width*0.56; ?>px";
			}
		}
		ythw<?php echo $i; ?>();
		jQuery(window).on("resize",function(){
			ythw<?php echo $i; ?>();
		});
	});
</script>
<style>
	#yt_player_<?php echo $video->id; ?> {
		<?php
	switch($paramssld['video_pl_position']){
		case "left":
			?>
			float:left;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			<?php
			break;
		case "right":
			?>
			float:right;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			<?php
			break;
		case "center":
			?>
			display:block;
			margin:0px auto;
			<?php
			break;
	}
	?> 
	margin-top:<?php echo $paramssld['video_pl_margin_top']; ?>px;
	margin-bottom:<?php echo $paramssld['video_pl_margin_bottom'] ?>px;
	max-width:none;
	width:<?php echo $video_player[0]->width; ?>px;
	height:<?php echo floor($video_player[0]->width*0.56); ?>px;
	}
</style>
<div id="yt_player_<?php echo $video->id; ?>"></div>
<?php break;
case "vimeo":
	$vid=$video->video_url_1;
	$vid = explode("/",$vid);
	$vidid=  end($vid);
	if($j==0){
		$autoplay=$video_player[0]->autoplay;
	}else{
		$autoplay=0;
	}
	$vidurl="https://player.vimeo.com/video/".$vidid."?player_id=vimeo_player_".$video->id."&color=".$paramssld['video_pl_vimeo_color']."&autoplay=".$autoplay;
	?>
<script>
jQuery(document).ready(function(){
	function vimhw<?php echo $i; ?>(){
		var w=<?php echo $video_player[0]->width; ?>;
		if(jQuery("#vimeo_player_<?php echo $video->id; ?>").parent().width()<w){
			document.getElementById("vimeo_player_<?php echo $video->id; ?>").style.width="100%";
			var w=document.getElementById("vimeo_player_<?php echo $video->id; ?>").offsetWidth;
			document.getElementById("vimeo_player_<?php echo $video->id; ?>").style.height=w*0.56+"px";
		}else{
			document.getElementById("vimeo_player_<?php echo $video->id; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
			document.getElementById("vimeo_player_<?php echo $video->id; ?>").style.height="<?php echo $video_player[0]->width*0.56; ?>px";
		}
	}
	vimhw<?php echo $i; ?>();
	jQuery(window).on("resize",function(){
		vimhw<?php echo $i; ?>();
	});
});
</script>
<style>
	#vimeo_player_<?php echo $video->id; ?> {
		<?php
		switch($paramssld['video_pl_position']){
			case "left":
				?>
				float:left;
				margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
				margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
				<?php
				break;
			case "right":
				?>
				float:right;
				margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
				margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
				<?php
				break;
			case "center":
				?>
				display:block;
				margin:0px auto;
				<?php
				break;
		}
		?> 
		margin-top:<?php echo $paramssld['video_pl_margin_top']; ?>px;
		margin-bottom:<?php echo $paramssld['video_pl_margin_bottom'] ?>px;
		width:<?php echo $video_player[0]->width; ?>px;
		max-width:none;
		height:<?php $ff=round($video_player[0]->width*0.56); echo $ff; ?>px;
	}
</style>
	<iframe id="vimeo_player_<?php echo $video->id; ?>" width="<?php echo $video_player[0]->width; ?>" height="<?php echo $video_player[0]->width*0.56; ?>" src="<?php echo $vidurl; ?>"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<?php
	break;
} 
$j++;
} ?>
<?php

break;














/////////////////////////////////////////////////////album///////////////////////////////////////////////////////////////////////////////////////////////////////////
















case 'album':
$i=rand(1,1000);
?>
<style>
#video_player_box<?php echo $i; ?> {
	display:none;
	position:relative;
	<?php
	switch($paramssld['video_pl_position']){
		case "left":
			?>
			float:left;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			<?php
			break;
		case "right":
			?>
			float:right;
			margin-right:<?php echo $paramssld['video_pl_margin_right'] ?>px;
			margin-left:<?php echo $paramssld['video_pl_margin_left'] ?>px;
			<?php
			break;
		case "center":
			?>
			width:<?php echo $video_player[0]->width+400; ?>px;
			margin:0px auto;
			<?php
			break;
	}
	?> 
	margin-top:<?php echo $paramssld['video_pl_margin_top']; ?>px;
	margin-bottom:<?php echo $paramssld['video_pl_margin_bottom'] ?>px;
	line-height:0 !important;
	overflow:hidden;
	padding:0px;
	background:#<?php echo $paramssld['video_pl_background_color']; ?>;
	border:<?php echo $paramssld['video_pl_border_size']; ?>px solid #<?php echo $paramssld['video_pl_border_color']; ?>;
	font-size:12px !important;
	font-weight:normal !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#video_player_box<?php echo $i; ?> i, #video_player_box<?php echo $i; ?> span {
	-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#player_container<?php echo $i; ?> {
	position:relative;
	float:left;
	width:<?php echo $video_player[0]->width; ?>px;
	overflow:hidden;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#player_container<?php echo $i; ?> button {
	color:#<?php echo $paramssld['video_pl_buttons_color']; ?> !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#player_container<?php echo $i; ?> button:hover {
	color:#<?php echo $paramssld['video_pl_buttons_hover_color']; ?> !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#huge_player_absolute<?php echo $i; ?> {
	position:relative;
	<?php 
	switch($video_player[0]->layout){
		case "left":
			echo "float:right;";
			break;
		case "bottom":
			//aaaaa
			break;
		case "right":
			echo "float:left;";
			break;
	}
	?>
	width:<?php echo $video_player[0]->width; ?>px;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#video_player_box<?php echo $i; ?> input:focus {
	outline:none;
	box-shadow:none;
	border:0;
}

#video_player<?php echo $i; ?> {
	width:100%;
	position: absolute;
	overflow:hidden;
	bottom: 30px;
}

#my_video<?php echo $i; ?> {
	position:absolute;
	width:100%;
	height:auto;
	outline: 0;
	left: 0px;
	top: 0px;
	transform: none;
	opacity: 1;
	background:transparent url('<?php echo $videos[0]->image_url; ?>') no-repeat center center; 
   -webkit-background-size:cover; 
   -moz-background-size:cover; 
   -o-background-size:cover; 
   background-size:cover; 
}

#video_duration_slide<?php echo $i; ?> { 
	width: 100%;
	height: 8px;
	padding: 0px;
	background: none;
	position: absolute;
	bottom: 27px;
}

#durationbar<?php echo $i; ?> {
	position:absolute;
	bottom:0px;
	left:0px;
	width:100%;
	height:8px;
	background:#<?php echo $paramssld['video_pl_timeline_background']; ?>;
	transition: height 1s ease;
}

#seekslider<?php echo $i; ?> {
	position: absolute;
	bottom: 0px;
	left:0px;
	display: block;
	width:1px;
	height:8px;
	background: #<?php echo $paramssld['video_pl_timeline_color']; ?>;
	content: '';
	z-index:4;
	transition: height 1s ease;
}

#curentslider<?php echo $i; ?> {
	position: absolute;
	top:-4px;
	left:0px;
	height:15px;
	width:15px;
	border-radius:100%;
	background:#<?php echo $paramssld['video_pl_timeline_slider_color']; ?>;
	z-index:5;
	cursor:pointer;
	transition:transform 1s ease;
}

#curentslider<?php echo $i; ?>:focus {
	cursor:pointer;
}


#bufferslide<?php echo $i; ?> {
	position: absolute;
	bottom:0px;
	display: block;
	width:1px;
	height:8px;
	content: '';
	background: #<?php echo $paramssld['video_pl_timeline_buffering_color']; ?>;
	left: 3px;
	transition: height 1s ease;
}

#timer_display<?php echo $i; ?> {
	position:absolute;
	display:none;
	left:0px;
	top:-31px;
	min-width:30px;
	padding:5px;
	background: #444;
	border:none;
	font-size: 12px;
	color:#fff;
	z-index: 5;
	text-align: center;
}

#ttd<?php echo $i; ?> {
	line-height:15px;
}

#pnt<?php echo $i; ?> {
	position:absolute;
	left:50%;
	top:20px;
	width: 10px;
	height: 10px;
	margin-left:-5px;
	-ms-transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    transform:rotate(45deg);
	background:#444;
}

div#video_controls_bar<?php echo $i; ?> {
	position: absolute;
	background: none repeat scroll 0% 0% #<?php echo $paramssld['video_pl_controls_panel_color']; ?>;
	height: 27px;
	bottom: 0px;
	width: 100%;
	padding: 0px;
}

#video_controls_bar<?php echo $i; ?> button {
	float:left;
	background:none;
	border:0;
	box-shadow:none;
	font-size:14px;
	cursor:pointer;
	padding:0px;
	margin:0px 5px 0px 5px;
	line-height:27px;
}

#video_controls_bar<?php echo $i; ?> button:focus {
	box-shadow:none;
	outline:none;
}

#time_display<?php echo $i; ?> {
	position:relative;
	float:left;
	padding-left:10px;
	line-height:27px;
	font-size:11px;
}



#volume<?php echo $i; ?> { 
	position:relative;
	float:left;
	width:60px;
	height:27px;
	background:none;
	cursor:pointer;
}

#volume_before<?php echo $i; ?> {
	position:absolute;
	top:10px;
	left:0px;
	height:5px;
	width:30px;
	background:#<?php echo $paramssld['video_pl_timeline_color']; ?>;
	z-index:40;
}

#volume_current<?php echo $i; ?> {
	position:absolute;
	top:5px;
	left:30px;
	height:15px;
	width:5px;
	background:#ddd;
	z-index:41;
}

#volume_after<?php echo $i; ?> {
	position:absolute;
	top:10px;
	left:0px;
	height:5px;
	width:60px;
	background:#<?php echo $paramssld['video_pl_timeline_buffering_color']; ?>;
	z-index:39;
}

#mutebtn<?php echo $i; ?> { float:left;width:15px; }

#fullscreenbtn<?php echo $i; ?> { float:right !important; }


#curtimetext<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_curtime_color']; ?>; }

#time_separator<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_durtime_color']; ?>; }

#durtimetext<?php echo $i; ?> { color:#<?php echo $paramssld['video_pl_durtime_color']; ?>; }

#centerPlayPause<?php echo $i; ?><?php echo $i; ?> {
	display:block;
	position:absolute;
	top:50%;
	left:50%;
	margin:-33px 0px 0px -38px;
	width:66px;
	height:77px;
}

#video_title_<?php echo $i; ?> {
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	padding:15px;
	background: #000;
	color: #fff;
	cursor: pointer;
	transition:opacity 1s ease;
	overflow:hidden;
	opacity:0.7;
}

#centerPlayPausebtn<?php echo $i; ?> {
	width:66px;
	height:77px;
	background:none;
	border:0;
	box-shadow:none;
	color:#8e8e8e;
	font-size:77px;
	cursor:pointer;
	padding:0;
	line-height:0;
	opacity:0.8;
}

#centerwaiting<?php echo $i; ?> {
	position:absolute;
	display:none;
	top:50%;
	left:50%;
	margin:-14px 0px 0px -14px;
	width:28px;
	height:28px;
	background:none;
	border:0;
	box-shadow:none;
	color:#8e8e8e;
	font-size:28px;
	cursor:pointer;
	padding:0;
	line-height:0;
}



#centerPlayPausebtn<?php echo $i; ?>:focus {
	box-shadow:none;
	outline:none;
}

#playlist_container<?php echo $i; ?> {
	position:relative;
	<?php 
	switch($video_player[0]->layout){
		case "left":
			echo "float:right;";
			break;
		case "bottom":
			//aaaaa
			break;
		case "right":
			echo "float:left;";
			break;
	}
	?>
	width:400px;
	height:<?php echo floor($video_player[0]->width*0.56); ?>px;
	overflow:hidden;
	background:#000;
	z-index:9;
	background:#<?php echo $paramssld['video_pl_playlist_color']; ?>;
	color:#<?php echo $paramssld['video_pl_playlist_text_color']; ?>;
}

#playlist_container<?php echo $i; ?> > h3 {
	margin:7px 0px 7px 5px;
	cursor:pointer;
	color:#<?php echo $paramssld['video_pl_playlist_head_color']; ?>;
	font-size:15px;
	height:17px;
	font-weight:normal;
}



#playlist_container<?php echo $i; ?> > ul {
	list-style-type:none;
	padding:0px;
	margin:0px;
	height:<?php echo $video_player[0]->width*0.56-31; ?>px;
	overflow-y:scroll;
}

#playlist_container<?php echo $i; ?> > ul::-webkit-scrollbar {
    width:8px;
}
#playlist_container<?php echo $i; ?> > ul::-webkit-scrollbar-track {
    background-color: #<?php echo $paramssld['video_pl_playlist_scroll_track']; ?>;
}
#playlist_container<?php echo $i; ?> > ul::-webkit-scrollbar-thumb {
    background-color: #<?php echo $paramssld['video_pl_playlist_scroll_thumb']; ?>;
}
#playlist_container<?php echo $i; ?> > ul::-webkit-scrollbar-thumb:hover {
    background-color: #<?php echo $paramssld['video_pl_playlist_scroll_thumb_hover']; ?>;
}

#playlist_container<?php echo $i; ?> > ul > li {
	list-style-type:none;
	padding:0px;
	margin:0px;
}

#playlist_container<?php echo $i; ?> > ul > li.active button {
	background:#<?php echo $paramssld['video_pl_playlist_active_color']; ?>;
	color:#<?php echo $paramssld['video_pl_playlist_active_text_color']; ?>;
}

#playlist_container<?php echo $i; ?> > ul > li > button {
	position:relative;
	float:left;
	width:100%;
	height:50px;
	text-align:left;
	line-height:50px;
	background:none;
	border:0;
	padding:0px;
	margin:0px;
	box-shadow:none;
	cursor:pointer;
	overflow:hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	color:#cacaca;
	font-size:12px !important;
	font-weight:normal !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#playlist_container<?php echo $i; ?> > ul > li > button:hover {
	background:#<?php echo $paramssld['video_pl_playlist_hover_color']; ?>;
	color:#<?php echo $paramssld['video_pl_playlist_hover_text_color']; ?>;
}

#playlist_container<?php echo $i; ?> > ul > li > button:focus {
	box-shadow:none;
	outline:none;
	
}

#playlist_container<?php echo $i; ?> > ul > li > button img {
	float:left;
	margin:5px;
	width:72px;
	height:40px;
}

#playlist_container<?php echo $i; ?> > ul > li > button span {
	color:#cacaca;
	font-size:12px !important;
	font-weight:normal !important;
	text-shadow:none !important;
	box-shadow:none !important
	outline:none !important;
	text-decoration:none !important;
}

#yt_player_<?php echo $i; ?> {
	width:<?php echo $video_player[0]->width; ?>px;
	height:<?php echo floor($video_player[0]->width*0.56); ?>px;
	position:relative;
	<?php 
	switch($video_player[0]->layout){
		case "left":
			echo "float:right;";
			break;
		case "bottom":
			//aaaaa
			break;
		case "right":
			echo "float:left;";
			break;
	}
	?>
	z-index:10;
	margin:0px;
}


#vimeo_player_<?php echo $i; ?> {
	width:<?php echo $video_player[0]->width; ?>px;
	height:<?php echo floor($video_player[0]->width*0.56); ?>px;
	position:relative;
	<?php 
	switch($video_player[0]->layout){
		case "left":
			echo "float:right;";
			break;
		case "bottom":
			//aaaaa
			break;
		case "right":
			echo "float:left;";
			break;
	}
	?>
}

#vimeo_player_if_<?php echo $i; ?> {
	position:absolute;
	bottom:0px;
	margin:0px;
	left:0px;
}
</style>
<script type="text/javascript">
var oldvolume<?php echo $i; ?>,videowidth<?php echo $i; ?>, videoheight<?php echo $i; ?>, tracks_buttons<?php echo $i; ?>,title<?php echo $i; ?>, vidbox<?php echo $i; ?>, vid<?php echo $i; ?>, playbtn<?php echo $i; ?>, centerbtn<?php echo $i; ?>, centerwaiting<?php echo $i; ?>, slidebox<?php echo $i; ?>, durationbar<?php echo $i; ?>, seekslider<?php echo $i; ?>, progressbar<?php echo $i; ?>, curtimetext<?php echo $i; ?>, durtimetext<?php echo $i; ?>, mutebtn<?php echo $i; ?>,volume_before<?php echo $i; ?>, volume_current<?php echo $i; ?>, volumebox<?php echo $i; ?>, fullscreenbtn<?php echo $i; ?>;
function initializePlayer<?php echo $i; ?>(){
	oldvolume=0.5;
	// SET OBJECT LISTENERS
	tracks_buttons<?php echo $i; ?>=jQuery("#playlist_container<?php echo $i; ?> > ul > li button");
	vidbox<?php echo $i; ?> = document.getElementById("player_container<?php echo $i; ?>");
	vid<?php echo $i; ?>=document.getElementById("my_video<?php echo $i; ?>");
	videowidth<?php echo $i; ?>=vid<?php echo $i; ?>.offsetWidth;
	videoheight<?php echo $i; ?>=vid<?php echo $i; ?>.offsetHeight;
	playbtn<?php echo $i; ?>=document.getElementById("PlayPausebtn<?php echo $i; ?>");
	title<?php echo $i; ?>=document.getElementById("video_title_<?php echo $i; ?>");
	fast_back<?php echo $i; ?>=document.getElementById("fast_back<?php echo $i; ?>");
	fast_forward<?php echo $i; ?>=document.getElementById("fast_forward<?php echo $i; ?>");
	centerbtn<?php echo $i; ?>=document.getElementById("centerPlayPause<?php echo $i; ?><?php echo $i; ?>");
	centerwaiting<?php echo $i; ?>=document.getElementById("centerwaiting<?php echo $i; ?>");
	slidebox<?php echo $i; ?>=document.getElementById("video_duration_slide<?php echo $i; ?>");
	durationbar<?php echo $i; ?>=document.getElementById("durationbar<?php echo $i; ?>");
	seekslider<?php echo $i; ?>=document.getElementById("seekslider<?php echo $i; ?>");
	curentslider<?php echo $i; ?>=document.getElementById("curentslider<?php echo $i; ?>");
	bufferslide<?php echo $i; ?>=document.getElementById("bufferslide<?php echo $i; ?>");
	progressbar<?php echo $i; ?>=document.getElementById("progressbar<?php echo $i; ?>");
	curtimetext<?php echo $i; ?>=document.getElementById("curtimetext<?php echo $i; ?>");
	durtimetext<?php echo $i; ?>=document.getElementById("durtimetext<?php echo $i; ?>");
	mutebtn<?php echo $i; ?>=document.getElementById("mutebtn<?php echo $i; ?>");
	volumebox<?php echo $i; ?>=document.getElementById("volume<?php echo $i; ?>");
	volume_current<?php echo $i; ?>=document.getElementById("volume_current<?php echo $i; ?>");
	volume_before<?php echo $i; ?>=document.getElementById("volume_before<?php echo $i; ?>");
	fullscreenbtn<?php echo $i; ?>=document.getElementById("fullscreenbtn<?php echo $i; ?>");
	
	// ADD EVENT LISTENERS
	loadVideo<?php echo $i; ?>();
	
	vidbox<?php echo $i; ?>.addEventListener("mouseover",showProgressBar<?php echo $i; ?>,false);
	vidbox<?php echo $i; ?>.addEventListener("mouseout",hideProgressBar<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("canplay",notWaiting<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("ended",vidEnd<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("playing",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("loadeddata",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("canplaythrough",progressHandler<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("progress",progressHandler<?php echo $i; ?>,false);
	
	vid<?php echo $i; ?>.addEventListener("waiting",waiting<?php echo $i; ?>,false);
	
	
	
	centerbtn<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	playbtn<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	fast_back<?php echo $i; ?>.addEventListener("click",fastBack<?php echo $i; ?>,false);
	fast_forward<?php echo $i; ?>.addEventListener("click",fastForward<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("click",PlayPause<?php echo $i; ?>,false);
	vid<?php echo $i; ?>.addEventListener("dblclick",toggleFullScreen<?php echo $i; ?>,false);
	
	//VIDEO SEEKING***********************************************
	var drag;
	slidebox<?php echo $i; ?>.addEventListener("mousedown",function(e){
		drag=1;
		vidSeeking<?php echo $i; ?>(e);
		vidSeek();
	},false);
	window.addEventListener("mousemove",function(e){
		if(drag==1){
			vid<?php echo $i; ?>.pause();
			vidSeeking<?php echo $i; ?>(e);
		}
	},false);
	window.addEventListener("mouseup",function(){
		if(drag==1){
			vid<?php echo $i; ?>.play();
			centerbtn<?php echo $i; ?>.style.display="none";
			vidSeek();
			drag="";
		}
	})
	
	vid<?php echo $i; ?>.addEventListener("timeupdate",function(){
		if(drag!=1){
			seektimeupdate<?php echo $i; ?>();
		}
		
	},false);
	//*************************************************************
	
	
	// ON SLIDER HOVER DISPLAY THE TIME**************************
	slidebox<?php echo $i; ?>.addEventListener("mousemove",timerDisplay<?php echo $i; ?>,false);
	slidebox<?php echo $i; ?>.addEventListener("mouseout",timerNotDisplay<?php echo $i; ?>,false);
	mutebtn<?php echo $i; ?>.addEventListener("click",vidmute<?php echo $i; ?>,false);
	//**************************************************************
	
	
	//CHANGE VOLUME****************************
	var dragvol;
	volumebox<?php echo $i; ?>.addEventListener("mousedown",function(e){
		dragvol=1;
		setVolume<?php echo $i; ?>(e);
	},false);
	window.addEventListener("mousemove",function(e){
		if(dragvol==1){
			setVolume<?php echo $i; ?>(e);
		}
	},false);
	window.addEventListener("mouseup",function(){
		if(dragvol==1){
			dragvol="";
		}
	})
	//*************************************************************
	
	// VIDEO FULLSCREEN TOGGLE***********************************
	fullscreenbtn<?php echo $i; ?>.addEventListener("click",toggleFullScreen<?php echo $i; ?>,false);
	//***********************************************************
	
	
	//KEY EVENTS**********************************************
	
	document.getElementById("video_player_box<?php echo $i; ?>").addEventListener("mouseover",function(){
		window.addEventListener("keydown",keyFunction<?php echo $i; ?>,false);
	},false)
	document.getElementById("video_player_box<?php echo $i; ?>").addEventListener("mouseout",function(){
		window.removeEventListener("keydown",keyFunction<?php echo $i; ?>,false);
	},false)
	//*********************************************************
	
	
	//PLAYLIST->CHANGE TRACKS
	tracks_buttons<?php echo $i; ?>.each(function(){
			jQuery(this).on("click",function(){
			ChangeTrack(jQuery(this));
		});
	})
	//**************************
	
	//EXIT FULLSCREEN*************************************************
	vidbox<?php echo $i; ?>.addEventListener('webkitfullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('mozfullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('fullscreenchange', exitHandler<?php echo $i; ?>, false);
    vidbox<?php echo $i; ?>.addEventListener('MSFullscreenChange', exitHandler<?php echo $i; ?>, false);	
	//******************************************************************
	
	
	// VIMEO // ************************************************************************ NOT WORKING PEACE OF SHIT **********************************************************
	
	
	var vimeo_player_iframe = document.getElementById('vimeo_player_if_<?php echo $i; ?>');
	var vimeo_player = $f(vimeo_player_iframe);
	vimeo_player.addEvent('ready', function(){		
			vimeo_player.addEvent('finish',function(){
			vidEnd<?php echo $i; ?>();
		});
	});
	
	
	//RESPONSIVE??????????????????????******************************
	jQuery(window).on("resize",function(){
		if (isFullScreen<?php echo $i; ?>())
			console.log("");
		//nothing
		else
        adjustWidthHeights<?php echo $i; ?>();
		
	});
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},500);
	//*******************************************
}


function adjustWidthHeights<?php echo $i; ?>(){
	var layout="<?php echo $video_player[0]->layout; ?>";
	jQuery("#video_player_box<?php echo $i; ?>").css({display:"block"});
	
	switch(layout){
		case "left":
			var allw=<?php echo $video_player[0]->width+400; ?>;
			var w =<?php echo $video_player[0]->width; ?>;
			if(jQuery("#video_player_box<?php echo $i; ?>").parent().width()<allw){
				if(jQuery("#video_player_box<?php echo $i; ?>").parent().width()<w){
					document.getElementById("video_player_box<?php echo $i; ?>").style.width="100%";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="100%";
					document.getElementById("player_container<?php echo $i; ?>").style.width="100%";
					document.getElementById("playlist_container<?php echo $i; ?>").style.width="100%";
					document.getElementById("yt_player_<?php echo $i; ?>").style.width="100%";
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="100%";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="100%";
					var h=vid<?php echo $i; ?>.offsetHeight;
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
					var yh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
					var vh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
				}else{
					jQuery("#playlist_container<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
					jQuery("#video_player_box<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
					document.getElementById("yt_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("player_container<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					var h=vid<?php echo $i; ?>.offsetHeight;
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
					var yh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
					var vh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
				}
				
			}else{
				jQuery("#playlist_container<?php echo $i; ?>").css({"width":400});
				jQuery("#video_player_box<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width+400; ?>});
				document.getElementById("yt_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("player_container<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				var h=vid<?php echo $i; ?>.offsetHeight;
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
				var yh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
				var vh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
			}
			break;
		case "bottom":
			var allw=<?php echo $video_player[0]->width; ?>;
			var w =<?php echo $video_player[0]->width; ?>;
			if(jQuery("#video_player_box<?php echo $i; ?>").parent().width()<w){
				document.getElementById("video_player_box<?php echo $i; ?>").style.width="100%";
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="100%";
				document.getElementById("player_container<?php echo $i; ?>").style.width="100%";
				document.getElementById("playlist_container<?php echo $i; ?>").style.width="100%";
				document.getElementById("yt_player_<?php echo $i; ?>").style.width="100%";
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="100%";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="100%";
				var h=vid<?php echo $i; ?>.offsetHeight;
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
				var yh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
				var vh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
			}else{
				jQuery("#playlist_container<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
				jQuery("#video_player_box<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("player_container<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("yt_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				var h=vid<?php echo $i; ?>.offsetHeight;
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
					var yh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
					var vh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
			}
			
			break;
		case "right":
			var allw=<?php echo $video_player[0]->width+400; ?>;
			var w =<?php echo $video_player[0]->width; ?>;
			if(jQuery("#video_player_box<?php echo $i; ?>").parent().width()<allw){
				if(jQuery("#video_player_box<?php echo $i; ?>").parent().width()<w){
					document.getElementById("video_player_box<?php echo $i; ?>").style.width="100%";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="100%";
					document.getElementById("player_container<?php echo $i; ?>").style.width="100%";
					document.getElementById("playlist_container<?php echo $i; ?>").style.width="100%";
					document.getElementById("yt_player_<?php echo $i; ?>").style.width="100%";
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="100%";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="100%";
					var h=vid<?php echo $i; ?>.offsetHeight;
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
					var yh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
					var vh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
				}else{
					jQuery("#playlist_container<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
					jQuery("#video_player_box<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width; ?>});
					document.getElementById("yt_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					document.getElementById("player_container<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
					var h=vid<?php echo $i; ?>.offsetHeight;
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
					document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
					var yh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
					var vh=<?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
					document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
				}
			}else{
				var h=vid<?php echo $i; ?>.offsetHeight;
				var hb=h+30;
				jQuery("#playlist_container<?php echo $i; ?>").css({"width":400});
				jQuery("#video_player_box<?php echo $i; ?>").css({"width":<?php echo $video_player[0]->width+400; ?>});
				document.getElementById("yt_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				document.getElementById("player_container<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
				var h=vid<?php echo $i; ?>.offsetHeight;
				document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("player_container<?php echo $i; ?>").style.height=h+30+"px";
				document.getElementById("video_player<?php echo $i; ?>").style.height=h+"px";
				var yh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("yt_player_<?php echo $i; ?>").style.height=yh+"px";
				var vh=<?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("vimeo_player_<?php echo $i; ?>").style.height=vh+"px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").style.height=vh+"px";
			}
			break;
	}
	var type=jQuery("#playlist_container > ul > li.active").data("type");
	switch(type){
		case "video":
			var h=vid<?php echo $i; ?>.offsetHeight;
			var hb=h+30;
			document.getElementById("playlist_container<?php echo $i; ?>").style.height=hb+"px";
			break;
		case "youtube":
			var h=<?php echo $video_player[0]->width*0.56 ?>;
			document.getElementById("playlist_container<?php echo $i; ?>").style.height=hh+"px";
			break;
		case "vimeo":
			var h=<?php echo $video_player[0]->width*0.56 ?>;
			document.getElementById("playlist_container<?php echo $i; ?>").style.height=hh+"px";
			break;
	}
}
	
<?php
$video_thumb_url=get_youtube_thumb_id_from_url($videos[0]->video_url_1);	?>
var yy<?php echo $i; ?>;
function onYouTubeIframeAPIReady(){
yy<?php echo $i; ?> = new YT.Player('yt_player_<?php echo $i; ?>',{
	width		: '<?php echo $video_player[0]->width; ?>',
	height		: '<?php echo floor($video_player[0]->width*0.56); ?>',
	videoId     : '<?php if($videos[0]->sl_type=="youtube"){ $a=preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","$1",$videos[0]->video_url_1);echo $a; } ?>',
	playerVars:{
		'autohide':			<?php echo $paramssld['video_pl_yt_autohide']; ?>,
		'autoplay':			<?php echo $video_player[0]->autoplay; ?>,
		'controls': 		1,
		'fs':				<?php echo $paramssld['video_pl_yt_fullscreen']; ?>,
		'disablekb':		0,
		'modestbranding':	1,
		'enablejsapi': 1,
		// 'cc_load_policy': 1, // forces closed captions on
		'iv_load_policy':	<?php echo $paramssld['video_pl_yt_annotation']; ?>, // annotations, 1=on, 3=off
		// 'playlist': videoID, videoID, videoID, etc,
		'rel':				1,
		'showinfo':			<?php echo $paramssld['video_pl_yt_showinfo']; ?>,
		'theme':			'<?php echo $paramssld['video_pl_yt_theme']; ?>',	// dark, light
		'color':			'<?php echo $paramssld['video_pl_yt_color']; ?>'	// red, white
		},
	events:{
		'onStateChange': onPlayerState<?php echo $i; ?>,
		'onError': onPlayerError<?php echo $i; ?>,
		}
	});
}
function onPlayerError<?php echo $i; ?>(){
	console.log("Youtube API error");
}
function onPlayerState<?php echo $i; ?>(state){
	switch(state.data){
		case -1: //unstarted
			/* do something */
			break;
		case 0: // ended
			vidEnd<?php echo $i; ?>();
			break;
		case 1: // playing
			break;
		case 2: // paused
			break;
		case 3: // buffering
			/* do something */
			break;
		case 5: // video cued
			/* do something */
			break;
		default:
			// do nothing
		}
	} 


function exitHandler<?php echo $i; ?> (){                                   
	if (isFullScreen<?php echo $i; ?>()){
		console.log("");
		// nothing _|_
	} else{
		cFullScreen<?php echo $i; ?>();     
	}
} 


function loadVideo<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.autoplay){
		playbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-pause"></i>';
		centerbtn<?php echo $i; ?>.style.display="none";
	}else{
		playbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-play"></i>';
		centerbtn<?php echo $i; ?>.style.display="block";
		centerwaiting<?php echo $i; ?>.style.display="none";
	}
	var durmins = Math.floor(vid<?php echo $i; ?>.duration / 60);
	var dursecs = Math.floor(vid<?php echo $i; ?>.duration - durmins * 60);
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(durmins < 10){ durmins = "0"+durmins; }
	durtimetext<?php echo $i; ?>.innerHTML = "--";
	curtimetext<?php echo $i; ?>.innerHTML = "--";
	setTimeout(function(){
		videoheight =vid<?php echo $i; ?>.offsetHeight;
		var hb = videoheight+30;
		document.getElementById("video_player<?php echo $i; ?>").style.height = videoheight+"px";
		document.getElementById("player_container<?php echo $i; ?>").style.height = hb+"px";
	},1000)
	
}

function fastBack<?php echo $i; ?>(){
	var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
	if(p>0){
		var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)-15)/100);
		vid<?php echo $i; ?>.currentTime = seekto;
	}
}

function fastForward<?php echo $i; ?>(){
	var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
	if(p<100){
		var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)+15)/100);
		vid<?php echo $i; ?>.currentTime = seekto;
	}
}

function showProgressBar<?php echo $i; ?>(){
	curentslider<?php echo $i; ?>.style.transform  = "scale(1,1)";
	title<?php echo $i; ?>.style.opacity  = "0.7";
	curentslider<?php echo $i; ?>.style.top  = "-4px";
	durationbar<?php echo $i; ?>.style.height = "8px";
	durationbar<?php echo $i; ?>.style.bottom = "0px";
	seekslider<?php echo $i; ?>.style.height = "8px";
	seekslider<?php echo $i; ?>.style.bottom = "0px";
	bufferslide<?php echo $i; ?>.style.height = "8px";
	bufferslide<?php echo $i; ?>.style.bottom = "0px";
}

function hideProgressBar<?php echo $i; ?>(){
	curentslider<?php echo $i; ?>.style.transform  = "scale(0,0)";
	title<?php echo $i; ?>.style.opacity  = "0";
	curentslider<?php echo $i; ?>.style.top  = "-2px";
	durationbar<?php echo $i; ?>.style.height = "3px";
	durationbar<?php echo $i; ?>.style.bottom = "0px";
	seekslider<?php echo $i; ?>.style.height = "3px";
	seekslider<?php echo $i; ?>.style.bottom = "0px";
	bufferslide<?php echo $i; ?>.style.height = "3px";
	bufferslide<?php echo $i; ?>.style.bottom = "0px";
}

function waiting<?php echo $i; ?>(){
	centerwaiting<?php echo $i; ?>.style.display="block";
	centerbtn<?php echo $i; ?>.style.display="none";
}

function notWaiting<?php echo $i; ?>(){
	centerwaiting<?php echo $i; ?>.style.display="none";
}


function progressHandler<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.buffered.length > 0){
		var percent=(vid<?php echo $i; ?>.buffered.end(0)/vid<?php echo $i; ?>.duration)*100;
		var dw=durationbar<?php echo $i; ?>.offsetWidth;
		bufferslide<?php echo $i; ?>.style.width=Math.floor((dw*percent)/100)+"px";
			
	}
	
}
function PlayPause<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.paused){
		vid<?php echo $i; ?>.play();
		playbtn<?php echo $i; ?>.innerHTML = '<i class="hugeicons hugeicons-pause"></i>';
		centerbtn<?php echo $i; ?>.style.display="none";
	}else{
		vid<?php echo $i; ?>.pause();
		playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-play"></i>';
		centerbtn<?php echo $i; ?>.style.display="block";
		centerwaiting<?php echo $i; ?>.style.display="none";
	}
}
function vidEnd<?php echo $i; ?>(){
	playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-refresh"></i>';
	centerbtn<?php echo $i; ?>.style.display="block";
	// SOME JQUERY FOR PLAYLIST
	var tracks = jQuery("#playlist_container<?php echo $i; ?> > ul > li")
	var tracks_length = tracks.length;
	var active = jQuery("#playlist_container<?php echo $i; ?> > ul > li.active");
	var current_track_id=active.index();
	var nextvid,i;
	if(current_track_id==tracks_length-1){
		i=0;
	}else{
		i=current_track_id+1;
	}
	active.removeClass("active");
	tracks.eq(i).addClass("active");
	nextvid = tracks.eq(i).data("src");
	nextvidtype=tracks.eq(i).data("type");
	vid<?php echo $i; ?>.src=nextvid;
	vid<?php echo $i; ?>.play();
	var nextposter=tracks.eq(i).data("poster");
	vid<?php echo $i; ?>.style.background="transparent url('"+nextposter+"') no-repeat center center";
	var activevidtype=active.data("type");
	if(activevidtype=="video"){
		toggleFullScreen<?php echo $i; ?>();
	}
	switch(nextvidtype){
			case "video":
				vid<?php echo $i; ?>.src=nextvid;
				vid<?php echo $i; ?>.play();
				playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-pause"></i>';
				jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
				jQuery("#yt_player_<?php echo $i; ?>").hide(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").show(0);
				setTimeout(function(){
					vid<?php echo $i; ?>.style.width="100%";
					vid<?php echo $i; ?>.style.height="auto";
					var w = vid<?php echo $i; ?>.offsetHeight;
					var wb = w+30;
					document.getElementById("video_player<?php echo $i; ?>").style.height=w+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height=wb-31+"px";
				},100);
				yy<?php echo $i; ?>.loadVideoById('');
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src ="";
				break;
			case "youtube":
				jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
				jQuery("#yt_player_<?php echo $i; ?>").show(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
				var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
				var match = nextvid.match(regExp);
				if (match && match[2].length == 11) {
				  nextvid=match[2];
				} else {
				  //error
				}
				yy<?php echo $i; ?>.loadVideoById(nextvid);
				var h = <?php echo $video_player[0]->width*0.56; ?>;
				if(activevidtype!=nextvidtype){
					document.getElementById("playlist_container<?php echo $i; ?>").style.height="<?php echo $video_player[0]->width*0.56; ?>px";
					document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height="<?php echo $video_player[0]->width*0.56-31; ?>px";
				}
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src ="";
				vid<?php echo $i; ?>.src="";
				break;
			case "vimeo":
				jQuery("#vimeo_player_<?php echo $i; ?>").show(0);
				jQuery("#yt_player_<?php echo $i; ?>").hide(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
				arr = nextvid.split('/');
				strFine = arr[arr.length-1];
				nextvid="https://player.vimeo.com/video/"+strFine+"?autoplay=1&api=1&color=<?php echo $paramssld['video_pl_vimeo_color']; ?>&player_id=vimeo_player_if_<?php echo $i; ?>";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src =nextvid;
				setTimeout(function(){
					var h = document.getElementById("vimeo_player_if_<?php echo $i; ?>").offsetHeight;
					if(activevidtype!=nextvidtype){
						document.getElementById("playlist_container<?php echo $i; ?>").style.height=h+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height=h-31+"px";
					}
					
				},100);
				yy<?php echo $i; ?>.loadVideoById('');
				vid<?php echo $i; ?>.src="";
				break;
		}
	adjustWidthHeights<?php echo $i; ?>();
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},150);
}

function ChangeTrack(e){
	var tracks = jQuery("#playlist_container<?php echo $i; ?> > ul > li")
	var active = jQuery("#playlist_container<?php echo $i; ?> > ul > li.active")
	var current_track_id=active.index();
	var nextvid,i,nextvidtype;
	if(e.parent().index()!=current_track_id){
		nextvid=e.parent().data("src");
		nextvidtype=e.parent().data("type");
		var nextposter=e.parent().data("poster");
		vid<?php echo $i; ?>.style.background="transparent url('"+nextposter+"') no-repeat center center";
		active.removeClass("active");
		e.parent().addClass("active");
		switch(nextvidtype){
			case "video":
				vid<?php echo $i; ?>.src=nextvid;
				vid<?php echo $i; ?>.play();
				playbtn<?php echo $i; ?>.innerHTML ='<i class="hugeicons hugeicons-pause"></i>';
				jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
				jQuery("#yt_player_<?php echo $i; ?>").hide(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").show(0);
				setTimeout(function(){
					vid<?php echo $i; ?>.style.width="100%";
					vid<?php echo $i; ?>.style.height="auto";
					var w = vid<?php echo $i; ?>.offsetHeight;
					var wb = w+30;
					document.getElementById("video_player<?php echo $i; ?>").style.height=w+"px";
					document.getElementById("player_container<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").style.height=wb+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height=wb-31+"px";
				},100);
				yy<?php echo $i; ?>.loadVideoById('');
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src ="";
				break;
			case "youtube":
				jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
				jQuery("#yt_player_<?php echo $i; ?>").show(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
				var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
				var match = nextvid.match(regExp);
				if (match && match[2].length == 11) {
				  nextvid=match[2];
				} else {
				  //error
				}
				yy<?php echo $i; ?>.loadVideoById(nextvid);
				var h = <?php echo $video_player[0]->width*0.56; ?>;
				document.getElementById("playlist_container<?php echo $i; ?>").style.height=h+"px";
				document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height=h-31+"px";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src ="";
				vid<?php echo $i; ?>.src="";
				break;
			case "vimeo":
				jQuery("#vimeo_player_<?php echo $i; ?>").show(0);
				jQuery("#yt_player_<?php echo $i; ?>").hide(0);
				jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
				arr = nextvid.split('/');
				strFine = arr[arr.length-1];
				nextvid="https://player.vimeo.com/video/"+strFine+"?autoplay=1&api=1&color=<?php echo $paramssld['video_pl_vimeo_color']; ?>&player_id=vimeo_player_if_<?php echo $i; ?>";
				document.getElementById("vimeo_player_if_<?php echo $i; ?>").src =nextvid;
					var h = <?php echo $video_player[0]->width*0.56; ?>;
					document.getElementById("playlist_container<?php echo $i; ?>").style.height=h+"px";
					document.getElementById("playlist_container<?php echo $i; ?>").getElementsByTagName("ul")[0].style.height=h-31+"px";
				yy<?php echo $i; ?>.loadVideoById('');
				vid<?php echo $i; ?>.src="";
				break;
		}
	}
	adjustWidthHeights<?php echo $i; ?>();
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},150);
}

function mouseDown<?php echo $i; ?>(){
	slidebox<?php echo $i; ?>.addEventListener('mousemove', vidSeek, false);
}

function vidSeeking<?php echo $i; ?>(e){
	var x = e.clientX;
	var l=document.getElementById("player_container<?php echo $i; ?>").getBoundingClientRect().left;
	var pos = x-l;
	//var pospercent= Math.round((pos/sw)*100);
	var cw = curentslider<?php echo $i; ?>.offsetWidth;
	seekslider<?php echo $i; ?>.style.width = pos+"px";
	curentslider<?php echo $i; ?>.style.left = pos-cw/2+"px";
	var sw = seekslider<?php echo $i; ?>.offsetWidth;
	var dw= durationbar<?php echo $i; ?>.offsetWidth;
	var percent = Math.floor((sw/dw)*100);
	var seekto=Math.floor(vid<?php echo $i; ?>.duration*(percent/100));
	vid<?php echo $i; ?>.currentTime = seekto;
}
    
function vidSeek(){
	
}

function timerDisplay<?php echo $i; ?>(e){
	if(vid<?php echo $i; ?>.buffered.length > 0){
		var x = e.clientX;
		var l=document.getElementById("player_container<?php echo $i; ?>").getBoundingClientRect().left;
		var w=document.getElementById("timer_display<?php echo $i; ?>").offsetWidth;
		var sw=durationbar<?php echo $i; ?>.offsetWidth;
		var pos = x-l;
		var pospercent= Math.round((pos/sw)*100);
		var posTime=vid<?php echo $i; ?>.duration*(pospercent/100);
		var curmins = Math.floor(posTime / 60);
		var cursecs = Math.floor(posTime - curmins * 60);
		if(cursecs < 10){ cursecs="0"+cursecs; }
		if(curmins < 10){ curmins="0"+curmins; }
		document.getElementById("timer_display<?php echo $i; ?>").style.display = "block";
		document.getElementById("timer_display<?php echo $i; ?>").style.left = x-l-w/2+"px";
		document.getElementById("ttd<?php echo $i; ?>").innerHTML = curmins+":"+cursecs;
	}
}
function timerNotDisplay<?php echo $i; ?>(){
		document.getElementById("timer_display<?php echo $i; ?>").style.display = "none ";
		document.getElementById("timer_display<?php echo $i; ?>").style.left = "0px";
	
}
function seektimeupdate<?php echo $i; ?>(){
	var nt = vid<?php echo $i; ?>.currentTime*(100/vid<?php echo $i; ?>.duration);
	var dw=durationbar<?php echo $i; ?>.offsetWidth;
	var cw = curentslider<?php echo $i; ?>.offsetWidth;
	seekslider<?php echo $i; ?>.style.width=Math.floor((nt*dw)/100)+"px";
	curentslider<?php echo $i; ?>.style.left=Math.floor((nt*dw)/100)-cw/2+"px";
	var curmins = Math.floor(vid<?php echo $i; ?>.currentTime / 60);
	var cursecs = Math.floor(vid<?php echo $i; ?>.currentTime - curmins * 60);
	var durmins = Math.floor(vid<?php echo $i; ?>.duration / 60);
	var dursecs = Math.floor(vid<?php echo $i; ?>.duration - durmins * 60);
	if(cursecs < 10){ cursecs = "0"+cursecs; }
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(curmins < 10){ curmins = "0"+curmins; }
	if(durmins < 10){ durmins = "0"+durmins; }
	curtimetext<?php echo $i; ?>.innerHTML = curmins+":"+cursecs;
	durtimetext<?php echo $i; ?>.innerHTML = durmins+":"+dursecs;
}
function vidmute<?php echo $i; ?>(){
	if(vid<?php echo $i; ?>.muted){
		vid<?php echo $i; ?>.muted = false;
		mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
		var volboxw=volumebox<?php echo $i; ?>.offsetWidth;
		volume_before<?php echo $i; ?>.style.width=Math.floor(oldvolume*volboxw)+"px";
		var l = Math.floor(oldvolume*volboxw)-volume_current<?php echo $i; ?>.style.width;
		
		volume_current<?php echo $i; ?>.style.left=l+"px";
	}else{
		var volbefw=volume_before<?php echo $i; ?>.offsetWidth;
		var volboxw=volumebox<?php echo $i; ?>.offsetWidth;
		oldvolume=volbefw/volboxw;
		vid<?php echo $i; ?>.muted = true;
		mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
		volume_before<?php echo $i; ?>.style.width="0px";
		volume_current<?php echo $i; ?>.style.left="0px";
	}
}
function setVolume<?php echo $i; ?>(e){
	var x = e.clientX;
	var l=volumebox<?php echo $i; ?>.getBoundingClientRect().left;
	var pos = x-l;
	var cw=volume_current<?php echo $i; ?>.offsetWidth;
	if(pos>=0 && pos<=volumebox<?php echo $i; ?>.offsetWidth){
		volume_before<?php echo $i; ?>.style.width=pos+"px";
		volume_current<?php echo $i; ?>.style.left = pos+"px";
		var sw=volume_before<?php echo $i; ?>.offsetWidth;
		var bw=volumebox<?php echo $i; ?>.offsetWidth;
		var p = Math.floor((sw/bw)*100);
		oldvolume=p/100;
		vid<?php echo $i; ?>.volume=p/100;
		if(p<70){
			if(p==0){
				mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
			}else{
				mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
			}
		}else{
			mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
		}
	}
}

function toggleFullScreen<?php echo $i; ?>(){
	ff<?php echo $i; ?>(vidbox<?php echo $i; ?>)
}
function ff<?php echo $i; ?>(element)
{
    if (isFullScreen<?php echo $i; ?>())
        cFullScreen<?php echo $i; ?>();
    else
        rFullScreen<?php echo $i; ?>(element || document.documentElement);
}
function isFullScreen<?php echo $i; ?>()
{
    return (document.fullScreenElement && document.fullScreenElement !== null)
         || document.mozFullScreen
         || document.webkitIsFullScreen;
}
function rFullScreen<?php echo $i; ?>(element)
{
    if (element.requestFullscreen)
        element.requestFullscreen();
    else if (element.msRequestFullscreen)
        element.msRequestFullscreen();
    else if (element.mozRequestFullScreen)
        element.mozRequestFullScreen();
    else if (element.webkitRequestFullscreen)
        element.webkitRequestFullscreen();
	setTimeout(function(){
		vidbox<?php echo $i; ?>.style.width="100%";
		vidbox<?php echo $i; ?>.style.height="100%";
		vid<?php echo $i; ?>.style.width="100%";
		vid<?php echo $i; ?>.style.height="100%";
		document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="100%";
		document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height="100%";
		document.getElementById("video_player<?php echo $i; ?>").style.width="100%";
		document.getElementById("video_player<?php echo $i; ?>").style.height="100%";
		fullscreenbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-compress"></i>';
	},100)
}

function cFullScreen<?php echo $i; ?>()
{
    if (document.exitFullscreen)
        document.exitFullscreen();
    else if (document.msExitFullscreen)
        document.msExitFullscreen();
    else if (document.mozCancelFullScreen)
        document.mozCancelFullScreen();
    else if (document.webkitExitFullscreen)
        document.webkitExitFullscreen();
	
	setTimeout(function(){
		vid<?php echo $i; ?>.style.width="100%";
		vid<?php echo $i; ?>.style.height="auto";
		vidbox<?php echo $i; ?>.style.width="<?php echo $video_player[0]->width; ?>px";
		vidbox<?php echo $i; ?>.style.height=videoheight+30+"px";
		document.getElementById("video_player<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
		document.getElementById("video_player<?php echo $i; ?>").style.height=videoheight+"px";
		document.getElementById("huge_player_absolute<?php echo $i; ?>").style.width="<?php echo $video_player[0]->width; ?>px";
		document.getElementById("huge_player_absolute<?php echo $i; ?>").style.height=videoheight+30+"px";
		
	},50);
	adjustWidthHeights<?php echo $i; ?>();
	setTimeout(function(){
		adjustWidthHeights<?php echo $i; ?>();
	},100);
	fullscreenbtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-expand"></i>';
}

function keyFunction<?php echo $i; ?>(e){
	switch(e.keyCode){
		case 40:
			var lw=volume_current<?php echo $i; ?>.offsetLeft;
			var bw=volumebox<?php echo $i; ?>.offsetWidth;
			var val = Math.floor((lw/bw)*100);
			if(val>0){
				var p =val-10;
				if(p<0){
					p=0;
				}
				volume_before<?php echo $i; ?>.style.width=bw*(p/100)+"px";
				volume_current<?php echo $i; ?>.style.left=bw*(p/100)+"px";
				vid<?php echo $i; ?>.volume=p/100;
				if(p<70){
					if(p==0){
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
					}else{
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
					}
				}else{
					mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
				}
			}
			e.preventDefault();
			break;
		case 38:
			var lw=volume_current<?php echo $i; ?>.offsetLeft;
			var bw=volumebox<?php echo $i; ?>.offsetWidth;
			var val = Math.floor((lw/bw)*100);
			if(val<100){
				var p =val+10;
				if(p>100){
					p=100;
				}
				volume_before<?php echo $i; ?>.style.width=bw*(p/100)+"px";
				volume_current<?php echo $i; ?>.style.left=bw*(p/100)+"px";
				vid<?php echo $i; ?>.volume=p/100;
				if(p<70){
					if(p==0){
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-off"></i>';
					}else{
						mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-down"></i>';
					}
				}else{
					mutebtn<?php echo $i; ?>.innerHTML='<i class="hugeicons hugeicons-volume-up"></i>';
				}
			}
			e.preventDefault();
			break;
		case 39:
			var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
			if(p!=100){
				var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)+15)/100);
				vid<?php echo $i; ?>.currentTime = seekto;
			}
			e.preventDefault();
			break;
		case 37:
			var p = (seekslider<?php echo $i; ?>.offsetWidth/durationbar<?php echo $i; ?>.offsetWidth)*100;
			if(p!=0){
				var seekto=vid<?php echo $i; ?>.duration*((parseInt(p)-15)/100);
				vid<?php echo $i; ?>.currentTime = seekto;
			}
			
			e.preventDefault();
			break;
		case 32:
			if ("createEvent" in document) {
				var evt = document.createEvent("HTMLEvents");
				evt.initEvent("click", false, true);
				playbtn<?php echo $i; ?>.dispatchEvent(evt);
			}
			else
				playbtn<?php echo $i; ?>.fireEvent("onclick");
			e.preventDefault();
			break;
	}
}
jQuery(document).ready(function(){
	initializePlayer<?php echo $i; ?>();
});
</script>
<script>
var type="<?php echo $videos[0]->sl_type; ?>";
function setHeights(){
	var h=<?php echo floor($video_player[0]->width*0.56); ?>;
	h=parseInt(h);
		switch(type){
			case "video":
				//aaaa
				break;
			case "youtube":
				//document.getElementById("playlist_container<?php echo $i; ?>").style.height=h+"px";
				break;
			case "vimeo":
				//document.getElementById("playlist_container<?php echo $i; ?>").style.height=h+"px";
				break;
	}
}
setTimeout(function(){
	switch(type){
		case "video":
			jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
			jQuery("#yt_player_<?php echo $i; ?>").hide(0);
			//jQuery("#playlist_container<?php echo $i; ?>").css({"marginTop":"0px"});
			break;
		case "youtube":
			jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
			jQuery("#vimeo_player_<?php echo $i; ?>").hide(0);
			if("<?php echo $video_player[0]->layout; ?>"=="bottom")
			//jQuery("#playlist_container<?php echo $i; ?>").css({"marginTop":"-2.6px"});
			//document.getElementById("yt_player_<?php echo $i; ?>").src = "<?php $a=preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","https://www.youtube.com/embed/$1?enablejsapi=1",$videos[0]->video_url_1);echo $a; ?>";
			setHeights();
			break;
		case "vimeo":
			jQuery("#huge_player_absolute<?php echo $i; ?>").hide(0);
			jQuery("#yt_player_<?php echo $i; ?>").hide(0);
			<?php
				$vid=$videos[0]->video_url_1;
				$vid = explode("/",$vid);
				$vidid=  end($vid);
				$vidurl="https://player.vimeo.com/video/".$vidid."?api=1&color=".$paramssld['video_pl_vimeo_color']."&&player_id=vimeo_player_if_".$i;;
				?>
			document.getElementById("vimeo_player_if_<?php echo $i; ?>").src="<?php echo $vidurl; ?>";
			//jQuery("#playlist_container<?php echo $i; ?>").css({"marginTop":"0px"});
			setHeights();
			break;
	}
},2000)

function getId(url){
var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
var match = url.match(regExp);

if (match && match[2].length == 11) {
	return match[2];
} else {
	return 'error';
}
}

var myId = getId('http://www.youtube.com/watch?v=zbYf5_S7oJo');

var myCode = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
    + myId + '" frameborder="0" allowfullscreen></iframe>';
</script>

<div id="video_player_box<?php echo $i; ?>">
	<div id="huge_player_absolute<?php echo $i; ?>">
		<div id="player_container<?php echo $i; ?>">
			<div id="video_player<?php echo $i; ?>">
				<video id="my_video<?php echo $i; ?>"  <?php if($video_player[0]->autoplay==1){ echo 'autoplay="true"'; } ?> <?php if($video_player[0]->preload==0){ echo 'preload="none"'; } ?>>
					<?php
					if($videos[0]->video_url_1!=""){
						?>
						<source src="<?php echo $videos[0]->video_url_1;  ?>" />
						<?php
					}else{
						if($videos[0]->video_url_2!=""){
							?>
							<source src="<?php echo $videos[0]->video_url_2;  ?>" />
							<?php
						}
					}
					?>
					Your browser does not support HTML5 video.
				</video>
			</div>
			<div id="video_duration_slide<?php echo $i; ?>">
				<div id="durationbar<?php echo $i; ?>"></div>
				<div id="seekslider<?php echo $i; ?>"></div>
				<div id="curentslider<?php echo $i; ?>"></div>
				<div id="bufferslide<?php echo $i; ?>"></div>
				<div id="timer_display<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false" ><span id="ttd<?php echo $i; ?>"></span><span id="pnt<?php echo $i; ?>"></span></div>
			</div>
			<div id="video_title_<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false" ><?php echo $videos[0]->name; ?></div>
			<div id="centerPlayPause<?php echo $i; ?><?php echo $i; ?>" unselectable="yes" onselectstart="return false">
				<button id="centerPlayPausebtn<?php echo $i; ?>"><i class="hugeicons hugeicons-play-circle-o"></i></button>
			</div>
			<div id="centerwaiting<?php echo $i; ?>">
				<i class="hugeicons hugeicons-spinner hugeicons-pulse"></i>
			</div>
			<div id="video_controls_bar<?php echo $i; ?>" unselectable="yes" onselectstart="return false"  >
				<button id="fast_back<?php echo $i; ?>"><i class="hugeicons hugeicons-backward"></i></button>
				<button id="PlayPausebtn<?php echo $i; ?>" ><i class="hugeicons hugeicons-play"></i></button>
				<button id="fast_forward<?php echo $i; ?>"><i class="hugeicons hugeicons-forward"></i></button>
				<button id="mutebtn<?php echo $i; ?>"><i class="hugeicons hugeicons-volume-up"></i></button>
				<div id="volume<?php echo $i; ?>">
					<div id="volume_before<?php echo $i; ?>"></div>
					<div id="volume_current<?php echo $i; ?>"></div>
					<div id="volume_after<?php echo $i; ?>"></div>
				</div>
				<div id="time_display<?php echo $i; ?>" unselectable="yes" onselectstart="return false" onmouseDown<?php echo $i; ?>="return false" >
					<span id="curtimetext<?php echo $i; ?>"></span><span id="time_separator<?php echo $i; ?>"> / </span><span id="durtimetext<?php echo $i; ?>"></span>
				</div>
				<button id="fullscreenbtn<?php echo $i; ?>"><i class="hugeicons hugeicons-expand"></i></button>
				<!--<button id="subtitles"><i class="hugeicons hugeicons-cc"></i></button>-->
			</div>
		</div>
	</div>
	<div id="yt_player_<?php echo $i; ?>"></div>
	<div id="vimeo_player_<?php echo $i; ?>"><iframe id="vimeo_player_if_<?php echo $i; ?>" src="" width="<?php echo $video_player[0]->width; ?>" height="<?php echo floor($video_player[0]->width*0.56); ?>"  frameborder="0" allowfullscreen></iframe></div>
	<div id="playlist_container<?php echo $i; ?>">
		<h3><?php echo $video_player[0]->name ?></h3>
			<ul>
			<?php 
				$j=0;
				foreach($videos as $video){
				?>
				<li data-poster="<?php echo $video->image_url; ?>" data-type="<?php echo $video->sl_type; ?>" data-src="<?php if($video->video_url_1!=""){ echo $video->video_url_1; }else{ echo $video->video_url_2; } ?>" class="<?php if($j==0){ echo "active";$j++; } ?>">
					<button>
						<img src="<?php echo $video->image_url; ?>" />
						<span class="item_title"><?php echo $video->name; ?></span>
					</button>
				</li>
				<?php

				}
			?>
			</ul>
	</div>
</div>
<?php
        break;
}
	return ob_get_clean();
}
?>