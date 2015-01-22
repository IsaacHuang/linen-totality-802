<!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
	<!-- 最後編譯與最小化JavaScript -->
	<script src='//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
	<script src='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/js/modernizr.js'></script>
	<script src='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/js/waypoints.min.js'></script>
	<script src='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/js/jquery.flexslider.js'></script>
	<script language="javascript" type="text/javascript" src="http://connect.facebook.net/zh_TW/all.js"></script>
	<script>
/***************** Waypoints ******************/

$(document).ready(function() {

	$('.wp1').waypoint(function() {
		$('.wp1').addClass('animated fadeInLeft');
	}, {
		offset: '75%'
	});
	$('.wp2').waypoint(function() {
		$('.wp2').addClass('animated fadeInUp');
	}, {
		offset: '75%'
	});
	$('.wp3').waypoint(function() {
		$('.wp3').addClass('animated fadeInDown');
	}, {
		offset: '55%'
	});
	$('.wp4').waypoint(function() {
		$('.wp4').addClass('animated fadeInDown');
	}, {
		offset: '75%'
	});
	$('.wp5').waypoint(function() {
		$('.wp5').addClass('animated fadeInUp');
	}, {
		offset: '75%'
	});
	$('.wp6').waypoint(function() {
		$('.wp6').addClass('animated fadeInDown');
	}, {
		offset: '75%'
	});

});

/***************** Slide-In Nav ******************/

$(window).load(function() {

	$('.nav_slide_button').click(function() {
		$('.pull').slideToggle();
	});

});

/***************** Smooth Scrolling ******************/

$(function() {

	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 2000);
				return false;
			}
		}
	});

});

/***************** Nav Transformicon ******************/


$(document).ready(function() {
	document.querySelector("#nav-toggle");
});

/***************** Overlays ******************/

$(document).ready(function(){
	if (Modernizr.touch) {
		// show the close overlay button
		$(".close-overlay").removeClass("hidden");
		// handle the adding of hover class when clicked
		$(".img").click(function(e){
			if (!$(this).hasClass("hover")) {
				$(this).addClass("hover");
			}
		});
		// handle the closing of the overlay
		$(".close-overlay").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			if ($(this).closest(".img").hasClass("hover")) {
				$(this).closest(".img").removeClass("hover");
			}
		});
	} else {
		// handle the mouseenter functionality
		$(".img").mouseenter(function(){
			$(this).addClass("hover");
		})
		// handle the mouseleave functionality
		.mouseleave(function(){
			$(this).removeClass("hover");
		});
	}
});

/***************** Flexsliders ******************/

$(window).load(function() {

	$('#portfolioSlider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav: true,
		touch: false,
		pauseOnHover: true,
		start: function() {
			$.waypoints('refresh');
		}
	});

	$('#servicesSlider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav: true,
		touch: true,
		pauseOnHover: true,
		start: function() {
			$.waypoints('refresh');
		}
	});

	$('#teamSlider').flexslider({
		animation: "slide",
		directionNav: false,
		controlNav: true,
		touch: true,
		pauseOnHover: true,
		start: function() {
			$.waypoints('refresh');
		}
	});

});
/********去背**********/
function addClick(x, y, dragging)
{
	clickX.push(x);
	clickY.push(y);
	clickColor.push(area);
	clickSize.push(curSize);
	clickDrag.push(dragging);
};

function clearCanvas()
{
	drawing_ctx.clearRect(0, 0, canvasWidth, canvasHeight);
};
var contextPrototype = CanvasRenderingContext2D_.prototype;
  contextPrototype.clearRect = function() {
    this.element_.innerHTML = '';
  };

  contextPrototype.beginPath = function() {
    // TODO: Branch current matrix so that save/restore has no effect
    //       as per safari docs.
    this.currentPath_ = [];
  };

  contextPrototype.moveTo = function(aX, aY) {
    var p = this.getCoords_(aX, aY);
    this.currentPath_.push({type: 'moveTo', x: p.x, y: p.y});
    this.currentX_ = p.x;
    this.currentY_ = p.y;
  };

  contextPrototype.lineTo = function(aX, aY) {
    var p = this.getCoords_(aX, aY);
    this.currentPath_.push({type: 'lineTo', x: p.x, y: p.y});

    this.currentX_ = p.x;
    this.currentY_ = p.y;
  };

function redraw()
{
	
	var locX = 362;
	var locY = 980;
	drawing_ctx.beginPath();
	drawing_ctx.rect(locX, locY, 2, 12);
	drawing_ctx.closePath();
	drawing_ctx.fillStyle = area;
	drawing_ctx.fill();	
	drawing_ctx.save();
	drawing_ctx.beginPath();
	drawing_ctx.rect(drawingAreaX, drawingAreaY, ImgWidth_pic, ImgHeight_pic);
	drawing_ctx.clip();
	var i=0;
	for(; i < clickX.length; i++)
	{	
		drawing_ctx.beginPath();
		if(clickDrag[i] && i){
			drawing_ctx.moveTo(clickX[i-1], clickY[i-1]);
		}else{
			drawing_ctx.moveTo(clickX[i], clickY[i]);
		}
		drawing_ctx.lineTo(clickX[i], clickY[i]);
		drawing_ctx.closePath();
		drawing_ctx.strokeStyle = 'white';
		drawing_ctx.lineJoin = "round";
		drawing_ctx.lineWidth = curSize;
		drawing_ctx.stroke();
	}
	drawing_ctx.restore();
	drawing_ctx.globalAlpha = 1;
	drawing_ctx.drawImage(img_pic, drawingAreaX, drawingAreaY, drawingAreaWidth, drawingAreaHeight);
}
</script>
