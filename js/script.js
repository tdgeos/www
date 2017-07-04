

$(window).load(function() {
	
	/* ---------------------------------------------------------------------- */
	/*	Main Navigation
	/* ---------------------------------------------------------------------- */
	
	function centerImgs() {
		$('.jms-bg').each(function(){
			var img = $(this),
			    vpWidth = $(window).width(),
			    vpHeight,
			    imgHeight = img.attr("height"),
		        imgWidth = img.attr("width"),
		        imgAspectRatio = imgWidth / imgHeight,
		        vpAspectRatio,
		        newImgWidth,
		        newImgHeight = vpWidth / imgAspectRatio;
  
		    if( vpWidth <= 660 ) {
		        vpHeight = 300;
		        newImgWidth = imgWidth * vpHeight / imgHeight;
		    } else if( vpWidth > 660 && vpWidth <= 1000 ) {
		        vpHeight = 440;
		        newImgWidth = imgWidth * vpHeight / imgHeight;
		    } else {
		        vpHeight = 580;
		        newImgWidth = imgWidth * vpHeight / imgHeight;
		    }
		    
		    vpAspectRatio = vpWidth / vpHeight;
		        					
			if( vpAspectRatio <= imgAspectRatio ) {
			    img.css({
			        'margin-top': 0,
			        'width': newImgWidth,
			        'height': '100%',
			        'margin-left': (vpWidth - newImgWidth)/2
			    });
		    } else {
			    img.css({
			        'width': '100%',
			        'height': newImgHeight,
			        'margin-left': 'auto',
			        'margin-top': (vpHeight - newImgHeight)/2
			    });
		    }
		});
	}

	$(function() {
		var $mainNav    = $('#main_menu').children('ul'),
			$footerNav    = $('#footer-container .menu').children('ul'),
			optionsList = '<option value="" selected>Navigation</option>';
		
		// Regular nav
		$mainNav.on('mouseenter', 'li', function() {
			var $this    = $(this),
				$subMenu = $this.children('ul');
				$menuDesc = $this.children('span.desc');
			if( $subMenu.length ) $this.addClass('hover');
			$subMenu.hide().stop(true, true).fadeIn(200);
			if( $menuDesc.length ) $this.addClass('hover');
			$menuDesc.hide().stop(true, true).fadeIn(200);
		}).on('mouseleave', 'li', function() {
			$(this).removeClass('hover').children('ul').stop(true, true).fadeOut(50);
			$(this).removeClass('hover').children('span.desc').stop(true, true).fadeOut(50);
		});
		
		// Footer nav
		$footerNav.on('mouseenter', 'li', function() {
			var $this    = $(this),
				$subMenu = $this.children('ul');
				$menuDesc = $this.children('span.desc');
			if( $subMenu.length ) $this.addClass('hover');
			$subMenu.hide().stop(true, true).fadeIn(200);
			if( $menuDesc.length ) $this.addClass('hover');
			$menuDesc.hide().stop(true, true).fadeIn(200);
		}).on('mouseleave', 'li', function() {
			$(this).removeClass('hover').children('ul').stop(true, true).fadeOut(50);
			$(this).removeClass('hover').children('span.desc').stop(true, true).fadeOut(50);
		});

		// Responsive nav
		$mainNav.find('li').each(function() {
			var $this   = $(this),
				$anchor = $this.children('a'),
				depth   = $this.parents('ul').length - 1,
				indent  = '';

			if( depth ) {
				while( depth > 0 ) {
					indent += '--';
					depth--;
				}
			}

			optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
		}).end()
		  .after('<select class="responsive-nav">' + optionsList + '</select>');

		$('.responsive-nav').on('change', function() {
			window.location = $(this).val();
		});
		
		function changeWidth(menuloc){
			var menuWidth = $(menuloc).parent().parent().width();
			var menuItems = $(menuloc).size();
			var itemWidth = (menuWidth/menuItems)-1;
			$(menuloc).css({'width': itemWidth +'px'});
			$(menuloc).last().css({'width': itemWidth-1 +'px'});
			$(menuloc).first().css({'width': itemWidth-1 +'px'});
		}
		changeWidth('#footer-container .menu>ul>li')

		if($('#jms-slideshow').length){
			$('#jms-slideshow').jmslideshow();
			centerImgs();
		};
		if($('.tabs').length){$(".tabs").tabs({ fx: { opacity: 'show' } });};

		if($('.toggle h4').length){
			$(".toggle h4").click( function () {
				if($(this).next().is(":hidden")) {
					$(this).next().slideDown(400);
				} else {
					$(this).next().slideUp(400);
				}
			});
		};
		
		if($('.accordion h4').length){
			$(".accordion h4").click( function () {
				if($(this).next().is(":hidden")) {
					$(".accordion .toggle_inner").slideUp(400);
					$(this).next(".toggle_inner").slideDown(400);
				} else {
					$(this).next(".toggle_inner").slideUp(400);
				}
			});
		};

		if($('#gallery').length){
			var $container = $('#gallery');
			$container.isotope({
				itemSelector : 'article'
			});
			var $optionSets = $('#filters'),
			  $optionLinks = $optionSets.find('a');
			$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
				  return false;
				}
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected');
				
				// make option object dynamically, i.e. { filter: '.my-filter-class' }
				var options = {},
					key = $optionSet.attr('data-option-key'),
					value = $this.attr('data-option-value');
				// parse 'false' as false boolean
				value = value === 'false' ? false : value;
				options[ key ] = value;
				if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				  // changes in layout modes need extra logic
				  changeLayoutMode( $this, options )
				} else {
				  // otherwise, apply new options
				  $container.isotope( options );
				}
				
				return false;
			});
		};

		if($('a.fancybox, .blog_page_detail .image a').length){
			$('a.fancybox, .blog_page_detail .image a').fancybox();
		};

		if($('#gallery_detail_pics .slides').length){
			$('#gallery_detail_pics .slides').cycle({ 
				fx:     'fade', 
				speed:   500, 
				timeout: 5000,
				slideResize:   1,
				fit: 1,
				before: onBefore,
				manualTrump: false,
				pager:  '#gallery_detail_pics .nav', 
				pagerAnchorBuilder: function(idx, slide) { 
					return '#gallery_detail_pics .nav li:eq(' + idx + ') a'; 
				} 
			});
			function onBefore() {
				var $ht = $(this).height();
				$("img",this).css({height: "auto"});
				$(this).parent().animate({height: $ht});
			}
		};
    });
	$(window).resize(function() {
		if($('#jms-slideshow').length){
			centerImgs();
		};
		if($('#gallery').length){
			var $container = $('#gallery');
			$container.isotope({
				itemSelector : 'article'
			});
			var $optionSets = $('#filters'),
			  $optionLinks = $optionSets.find('a');
			$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
				  return false;
				}
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected');
				
				// make option object dynamically, i.e. { filter: '.my-filter-class' }
				var options = {},
					key = $optionSet.attr('data-option-key'),
					value = $this.attr('data-option-value');
				// parse 'false' as false boolean
				value = value === 'false' ? false : value;
				options[ key ] = value;
				if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				  // changes in layout modes need extra logic
				  changeLayoutMode( $this, options )
				} else {
				  // otherwise, apply new options
				  $container.isotope( options );
				}
				
				return false;
			});
		};
		if($('#gallery_detail_pics .slides').length){
			$('#gallery_detail_pics .slides').cycle({ 
				fx:     'fade', 
				speed:   500, 
				timeout: 5000,
				slideResize:   1,
				fit: 1,
				before: onBefore,
				manualTrump: false,
				pager:  '#gallery_detail_pics .nav', 
				pagerAnchorBuilder: function(idx, slide) { 
					return '#gallery_detail_pics .nav li:eq(' + idx + ') a'; 
				} 
			});
			function onBefore() {
				var $ht = $(this).height();
				$("img",this).css({height: "auto"});
				$(this).parent().animate({height: $ht});
			}
		};
	});

});
