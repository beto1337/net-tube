/* Author:
Last Exit London
*/

var mobileNav = {
	config: {
		menu: $(".site-nav-mobile, .site-nav-social"),
		toggle: $(".site-nav-toggle")
	},
	init: function () {


		var config = this.config;


		//thisMenu = $(this);

		config.toggle.click(function(e){

			e.preventDefault();

			if(config.menu.hasClass("visible")) {
				config.menu.removeClass("visible");
				config.menu.removeClass("search-on");
			} else {
				config.menu.addClass("visible");
			}

		});
	}
};


var stickyNav = {

	init: function () {

		var $header = $('.site-header'),
			$body = $('body');

		$header.waypoint( function(direction) {

			if(direction === "down") {
				$body.addClass("sticky-nav");
			} else {
				$body.removeClass("sticky-nav");
			}

		}, {
			offset: $body.width() > 1200 ? -37 : -10
		});

	}
};

var searchOverlay = {
	init: function () {

		var $overlay = $(".search-overlay");

		$(".show-search").click(function(e){
			e.preventDefault();
			$overlay.addClass("on");
		});

		$overlay.find(".close").click(function(e){
			e.preventDefault();
			$overlay.removeClass("on");
		});

		$(".search-mobile-on").click(function(e){
			e.preventDefault();

			$(this).parents(".site-nav-mobile").addClass("search-on").append("<div class=\"mobile-search\">" + $overlay.html() + "</div>");
		})

		$('.site-nav-mobile, .search-overlay').on("click", '#overlay-date-search', function (e) {
		    e.preventDefault();
		    if ($('#year-search-overlay').val() != "" && $('#month-search-overlay').val() != "" && $('#day-search-overlay').val() != "") {
		        window.location.href = '/charts/singles-chart/' + $('#year-search-overlay').val() + $('#month-search-overlay').val() + $('#day-search-overlay').val() + '/7501';
		    }
		});

		$('.site-nav-mobile, .search-overlay').on("click", '#overlay-title-search', function (e) {
		    e.preventDefault();
		    if ($('#overlay-title-search-text').val() != "") {
		        window.location.href = '/search/singles/' + helper.encodeProductName($('#overlay-title-search-text').val()) + '/';
		    }
		});

		$('.site-nav-mobile, .search-overlay').on("click", '#overlay-artists-search', function (e) {
		    e.preventDefault();
		    if ($('#overlay-artists-search-text').val() != "") {
		        window.location.href = '/search/artists/' + helper.encodeProductName($('#overlay-artists-search-text').val()) + '/';
		    }
		});
	}
};


var countdown = {
	init: function () {

		var now = new Date(),
			dst = $("#countdown").data("daylight-savings"),
			override = $("#countdown").data("date-override"),
			day = $("#countdown").data("clock-day"),
			hour = $("#countdown").data("clock-hours"),
			minute = $("#countdown").data("clock-mins"),
			offset = now.getUTCDay() < day || ( now.getUTCDay() === day && ( now.getUTCHours() < hour - dst || ( now.getUTCHours() === hour - dst && now.getUTCMinutes() < minute )) )  ?  0 : 7,
			release = new Date(),
			secondsLeft,
			overrideDate;


		if(override){
			overrideDate = new Date(override+"Z");

			overrideDate.setUTCHours(overrideDate.getUTCHours() - dst);
		}

		if( !overrideDate || overrideDate < now ){

			release.setUTCDate(now.getUTCDate() - now.getUTCDay() + day + offset);
			release.setUTCHours((hour - dst), minute ,0,0);

		} else {
			release = overrideDate;
		}

		secondsLeft = Math.floor((release - now) / 1000);

		this.render(secondsLeft);

	},
	render: function (secondsLeft) {

		var cdObject,
			cdHTML,
			labels = {},
			labelsPlural = {
				days: "days",
				hours: "hours",
				minutes: "mins",
				seconds: "secs"
			},
			labelsSingular = {
				days: "day",
				hours: "hour",
				minutes: "min",
				seconds: "sec"
			},
			that = this;

		function calculate() {

			secondsLeft--;

			cdObject = {
				days: Math.floor(secondsLeft / 86400),
				hours: Math.floor(secondsLeft / 3600) % 24,
				minutes: Math.floor(secondsLeft / 60) % 60,
				seconds: Math.floor(secondsLeft % 60)
			};

			for(var key in cdObject ){

				if ( cdObject[key] < 10 ) {
					cdObject[key] = '0' + cdObject[key];
				}

				labels[key] = cdObject[key] == 1 ? labelsSingular[key] : labelsPlural[key];

			}

			cdHTML = "<div class=\"days\"><div class=\"count\">"+cdObject.days+"</div><div class=\"label\">"+labels.days+"</div></div><div class=\"hours\"><div class=\"count\">"+cdObject.hours+"</div><div class=\"label\">"+labels.hours+"</div></div><div class=\"minutes\"><div class=\"count\">"+cdObject.minutes+"</div><div class=\"label\">"+labels.minutes+"</div></div><div class=\"seconds\"><div class=\"count\">"+cdObject.seconds+"</div><div class=\"label\">"+labels.seconds+"</div></div>";

			$('#countdown').html(cdHTML);

			if (secondsLeft <= 0) {

				clearInterval(cdInterval);

				setTimeout( function() { that.init(); }, 2000);

			}

		}

		calculate();
		cdInterval = setInterval(function () { calculate(); }, 1000);

	}
};

var randomLookup = {
	init: function () {

		if(document.getElementById("random-lookup")) {

			var options = $("#random-lookup").find("section"),
				ran = Math.floor(options.length * Math.random());


			var choice = options.splice(ran,1);

			options.hide();



		}

	}
};


var comments = {
 	init: function () {

 		$(".comments").each(function(){

 			var $that = $(this);

 			$that.find(".bar").click( function(e) {

 				e.preventDefault();

 				if( $that.hasClass("on") ) {
 					$that.removeClass("on")
 				} else {
 					$that.addClass("on");
 				}

 			});
 		})

 	}
};

var tabs = {
	init: function () {
		$("body").on("click", ".tab-nav a", function(e){

			e.preventDefault();

			var i = $(this).parent().index(),
				pages = $(this).parents(".tab-nav").siblings(".tab-page"),
				nav  = $(this).parents(".tab-nav").find("a");

			nav.removeClass("selected");

			$(this).addClass("selected");

			pages.removeClass("selected");

			pages.eq(i).addClass("selected");

		});
	}

};


var miniCharts = {

	config: {
		json: ""
	},
	init: function () {

		//This code to parse JSON from Ajax call to JSON service
		var that = this;

		 $.getJSON("/Umbraco/Api/ChartsApi/GetMiniCharts", function( data ){
		 	try {
		 	    var top100LinkText = $("#top-100-link-text").val();

		 	    that.renderSidebar(data.sidebar);
		 		that.renderFooter(data.footer, top100LinkText);
		 	} catch (e) {

		 		return e ;
		 	}
		 });		

	},
	renderSidebar: function (sidebarData) {

		var nav = "<nav class=\"tab-nav\"><ul>",

			pages = "";


		for (var i = 0, len = 3; i < len ; i++) {

			nav += "<li><a id=\"mini-charts-" + i + "\" href=\"#\"";

			pages += "<div class=\"tab-page";


			if(i === 0) {
				nav += " class=\"selected\"";

				pages += " selected"
			}

			nav += ">"+ sidebarData[i].chart.Name +"</a></li>";

			pages += "\"><header><h1><img src=\"/img/sidebar/chart/occ-"+sidebarData[i].chart.Type+"-charts.png\" alt=\""+sidebarData[i].chart.Name+"\"/></h1></header><div class=\"chart-list-mini\">"

			if (sidebarData[i].chart.Type == 141) {
			    pages += this.renderSideChartVideo(sidebarData[i].positions);
			} else {
			    pages += this.renderSideChart(sidebarData[i].positions);
			}

			pages += "<a href=\""+sidebarData[i].link+"\" class=\"cta\">VIEW the top 100</a></div></div>";


		}

		nav += "</ul></nav>";

		$("#sidebar-chart").html((nav + pages));
	},
	renderFooter: function (footerData, top100LinkText) {

		var nav = "<select class=\"select-dropdown\">",
			pages = "";

		for (var i = 0, len = footerData.length; i < len ; i++) {

			//nav += "<li><a href=\"#\"";
			nav += "<option value=" + i;

			pages += "<div class=\"dropdown-page"


			if(i === 0) {
				nav += " selected=\"selected\"";

				pages += " selected"
			}

			nav += ">"+ footerData[i].chart.Name +"</option>";

			pages += "\"><div class=\"chart-list-mini\">";

			pages += this.renderChart(footerData[i].positions, ( i === 0 ? false : true ), footerData[i].chart.Type);

			pages += "<a href=\""+footerData[i].link+"\" class=\"cta\">" + "VIEW the full chart" + "</a></div></div>";

		}

		nav += "</select>	";

		$("#footer-chart").html((nav + pages));

		this.footerEvents();

	},
	renderChart: function(chartData, disableImages, chartType) {

		var html = "<table>",
			openTag = disableImages ? "<span class=\"image-data\" data-src" : "<img src",
			closeTag = disableImages ? "></span>" : "width=\"60\" height=\"60\"/>" ;

		for (var i = 0, len = chartData.length; i < len ; i++) {

		    // The Artist Name in this URL doesn't affect the actual search so we're OK to change it
		    var artistName = chartData[i].artist_name.replace(/\ /g, '-').replace(/\//g, '-').replace(/\./g, '-').replace(/\&/g, 'and');

		    if (chartType == "12" || chartType == "14" || chartType == "15" || chartType == "16" || chartType == "17" || chartType == "30" || chartType == "141" || chartType == "252" || chartType == "30012") {
		        html += "<tr><td class=\"count\">0" + (i + 1) + "</td><td class=\"cover\" style=\"height:60px;width:60px\">" + openTag + "=\"" + chartData[i].image + "\"" + closeTag + "</td><td class=\"title-artist\"><div class=\"title\">" + chartData[i].product_name + "</div>";
		        html += "</td></tr>";
		    } else {
		        html += "<tr><td class=\"count\">0" + (i + 1) + "</td><td class=\"cover\" style=\"height:60px;width:60px\">" + openTag + "=\"" + chartData[i].image + "\"" + closeTag + "</td><td class=\"title-artist\"><div class=\"title\"><a href=\"/search/singles/" + encodeURIComponent(chartData[i].product_name) + "\">" + chartData[i].product_name + "</a></div>";
		        html += "<div class=\"artist\"><a href=\"/artist/" + chartData[i].artist_id + "/" + encodeURIComponent(artistName) + "\">" + chartData[i].artist_name + "</a></div></td></tr>";
		    }

		}

		html += "</table>";

		return html;

	},
	renderSideChart: function (chartData) {

	    var html = "<table>";

	    for (var i = 0, len = chartData.length; i < len ; i++) {

	        // The Artist Name in this URL doesn't affect the actual search so we're OK to change it
	        var artistName = chartData[i].artist_name.replace(/\ /g, '-').replace(/\//g, '-').replace(/\./g, '-').replace(/\&/g, 'and');
	        html += "<tr><td class=\"count\">0" + (i + 1) + "</td><td class=\"cover\" style=\"height:60px;width:60px\"><img src=\"" + chartData[i].image + "\" width=\"60\" height=\"60\" /></td><td class=\"title-artist\"><div class=\"title\"><a href=\"/search/singles/" + encodeURIComponent(chartData[i].product_name) + "\">" + chartData[i].product_name + "</a></div>";
	        html += "<a href=\"/artist/" + chartData[i].artist_id + "/" + encodeURIComponent(artistName) + "\" class=\"artist\">" + chartData[i].artist_name + "</a></td></tr>";

	    }

	    html += "</table>";

	    return html;

	},
	renderSideChartVideo: function (chartData) {

	    var html = "<table>";

	    for (var i = 0, len = chartData.length; i < len ; i++) {

	        html += "<tr><td class=\"count\">0" + (i + 1) + "</td><td class=\"cover\" style=\"height:60px;width:60px\"><img src=\"" + chartData[i].image + "\" width=\"60\" height=\"60\" /></td>";
	        html += "<td class=\"title-artist\"><div class=\"title\">" + chartData[i].product_name + "</div></td></tr>";

	    }

	    html += "</table>";

	    return html;

	},
	footerEvents: function () {

	    var r = Math.floor($("#footer-chart select > option").length * (Math.random() % 1));
        $(".select-dropdown > option").attr('selected', false).eq(r).attr('selected', true);
	    $(".select-dropdown").siblings(".dropdown-page").removeClass("selected").eq(r).addClass("selected").find(".image-data").each(function () {
	        $(this).after("<img src=\"" + $(this).data("src") + "\"  width=\"60\" height=\"60\"/>").remove();
	    });

		$(".select-dropdown").change(function(){
			var i = $(this).val();
			$(this).siblings(".dropdown-page").removeClass("selected").eq(i).addClass("selected").find(".image-data").each(function(){
				$(this).after("<img src=\""+$(this).data("src")+"\"  width=\"60\" height=\"60\"/>").remove();
			});
		})
	}
};

var chartRuns = {
	init: function () {

		var position;


		$(".chart-run-list > li > a").click(function(e){
			e.preventDefault();

			if($(this).hasClass("selected")) {

				$(this).removeClass("selected").siblings(".flyout").remove();

			} else {


				position = ($(this).parent().position().left + 1000 > $(this).parents(".chart-run-list").width()) ? " down" : "";



				$(this).parents(".chart-run-list").find(".selected").removeClass("selected").siblings(".flyout").remove();

				$(this).addClass("selected");

				$(this).after("<div class=\"flyout"+ position +"\">Chart date: <strong>" + $(this).data("date") + "</strong> <a href=\""+$(this).attr("href")+"\" class=\"button\">View Chart</a></div>");
			}


		});
	}
};

var accordion = {
	init: function () {

		$(".accordion .accordion-toggle").click(function(e){
			e.preventDefault();

			if ($(this).hasClass("on")){
				$(this).removeClass("on").siblings(".accordion-content").removeClass("on");
			} else {
				$(this).addClass("on").siblings(".accordion-content").addClass("on");
			}

		})

	}
};

var dropdown = {
	init: function(){

		$(".dropdown").on("click", ".selected", function(e){

			e.preventDefault();

			var $dropdown = $(this).parents(".dropdown"),
				$pages = $dropdown.siblings(".dropdown-page"),
				$nav = $dropdown.find(">ul a");

			if( $dropdown.hasClass("on") ) {
				$dropdown.removeClass("on");
			} else {
				$dropdown.addClass("on");
			}

			if( $pages.length > 0 ){

				$nav.click( function(e){

					e.preventDefault();

					var i = $(this).parent().index();

					$nav.removeClass("selected");

					$(this).addClass("selected");

					$pages.removeClass("selected");

					$pages.eq(i).addClass("selected");

				});

			}

		});
	}
};

var searchAutocomplete = {

	init: function () {

		var timer;
			that = this,
			$searchField = $(".search-autocomplete");

		$searchField.each( function() {

			var $this = $(this),
			 	searchType = $(this).data("searchType");

			$this.after("<div class=\"autocomplete\"></div>").on("keyup", function() {

				clearTimeout(timer);

				var thisElement = this,
					searchTerm = $(thisElement).val();

				if(searchTerm.length > 0){
					$(thisElement).parent().addClass("populated");
				} else {
					$(thisElement).parent().removeClass("populated");
				}

				timer = setTimeout(function(){

					if (searchTerm.length > 1) {
						that.performRequest(thisElement, searchTerm, searchType);
					} else {
						$(thisElement).siblings(".autocomplete").html("");
					}

				}, 500);


				$(thisElement).siblings(".clear-search").on("click", function (e) {

					e.preventDefault();

					$(thisElement).val("").siblings(".autocomplete").html("").end().parent().removeClass("populated");

				});

			});

			if($this.data("submitPath")){

				$this.parents("form").on("submit", function (e) {			

					e.preventDefault();		

					window.location.href = $this.data("submitPath") + $this.val();



				});
			}

		})
	},

	performRequest: function (element, searchTerm, searchType) {

		var that = this;

		$.ajax({
			dataType: "json",
			url: $(element).data("jsonPath") + searchTerm,
			//data: "/" + searchTerm,
			success: function (data) {

				var html = that.renderHTML(data, searchTerm, searchType);

				$(element).siblings(".autocomplete").html(html);

			}
		})

	},

	renderHTML: function(data, searchTerm, searchType) {

		var html = "<ul>",
			match = searchTerm.toUpperCase();

		if(searchType === "artist") {

			for (var i = 0, len = data.length; i < len; i++) {

			    // The Artist Name in this URL doesn't affect the actual search so we're OK to change it
			    var artistName = data[i].friendly_name;
			    html += "<li><a href=\"/artist/" + data[i].artist_id + "/" + encodeURIComponent(artistName) + "\">" + data[i].name.replace(match, "<span class=\"match\">" + match + "</span>") + "</a></li>";

			};
		}

		if(searchType === "title") {

			for (var i = 0, len = data.length; i < len; i++) {

			    html += "<li><a href=\"/search/singles/" + encodeURIComponent(data[i].name.toLowerCase()) + "\">" + data[i].name.replace(match, "<span class=\"match\">" + match + "</span>") + "</a></li>";

			};
		}

		html += "</ul>";

		return html;

	}

};


var sharingButtons = {

    init: function() {

        $(".social-sharing-bar").on("click", "a", function(e) {

        	if (!$(this).is("#disqus-comment-count")) {
        		e.preventDefault();
        	}

            var url = window.location.href;

        	if (url.indexOf("/galleries/") > -1) {
        	    url = $(".social-sharing-bar").attr("data-shareurl");
        	}

        	if($(this).hasClass("icon-twitter")) {

        		window.open("http://twitter.com/intent/tweet?url=" + encodeURI(url) + "&text=" + encodeURI(document.title), "share", "width=600,height=300");

        	} else if( $(this).hasClass("icon-facebook") ) {

        		window.open("http://www.facebook.com/sharer.php?u=" + encodeURI(url) , "share", "width=600,height=300");

        	} else if( $(this).hasClass("icon-googleplus") ) {

        		window.open("https://plus.google.com/share?url=" + encodeURI(url) , "share", "width=600,height=300");

        	} else if( $(this).hasClass("icon-reddit") ) {

        		window.open("http://reddit.com/submit?url=" + encodeURI(url) + "&title=" + encodeURI(document.title), "share", "width=600,height=300");

        	} else if($(this).hasClass("icon-email")) {

        		window.location.href = "mailto:?body=" + encodeURI(document.title) + " - " +  encodeURI(url);

        	}

        })


    }
};

var articleGallery = {
	init: function () {

		var $gallery =  $("#article-gallery"),
			$galleryItems =  $("#article-gallery").find(".item > img"),
			$navigation = $("#article-gallery-navigation"),
			$caption = $("#article-gallery-caption"),
			$previous = $navigation.find(".previous"),
			$next = $navigation.find(".next"),
			$current = $navigation.find(".current"),
			$total = $navigation.find(".total"),
            $socialSharingBar = $(".social-sharing-bar"),
			galleryData;

		$socialSharingBar.attr("data-shareurl", window.location.href);

		if($.fn.owlCarousel){

		  $gallery.owlCarousel({
		  	items: 1,
		  	itemsCustom: [[1600,1]],
		  	lazyLoad: true,
		  	pagination: false,
		  	afterMove: function(){

		  		var virtualPage = window.location.pathname + "?image=" + (galleryData.currentItem + 1);

		  		$current.html(galleryData.currentItem+1)
		  		$total.html(galleryData.itemsAmount)
		  		$caption.html($galleryItems.eq(galleryData.currentItem).data("caption"));

				try{
					googletag.pubads().refresh();	
				}catch(e){
					if(console){console.log(e)}
				}

				if( typeof _gaq === "object"){
					_gaq.push(['_trackPageview', virtualPage]);
				} else {
					if(console){
						console.log("Google analytics not loaded - pageview failed:" + virtualPage)
					}
				}

		  	}
		  });

		   if($gallery.length > 0){
			  galleryData = $gallery.data("owlCarousel");

				$current.html(1);
				$total.html(galleryData.itemsAmount);
			  	$caption.html($galleryItems.eq(0).data("caption"));


			  $previous.on("click", function(e) {
			  	e.preventDefault();
			  	galleryData.prev();
			  	articleGallery.setShareUrl($galleryItems.eq(galleryData.currentItem).data("id"));
			  });

			  $next.on("click", function(e) {
			  	e.preventDefault();
			  	galleryData.next();
			  	articleGallery.setShareUrl($galleryItems.eq(galleryData.currentItem).data("id"));
			  });		   	
		   }


		   if (window.location.search) {
		       var hash = window.location.search.substring(1);
		       var slideNo = $gallery.find("img.lazyOwl[data-id='" + hash + "']").data("slideno");
		       $gallery.data("owlCarousel").jumpTo(slideNo);
		   }

		} else {
			if(console){
				console.log("plugin missing - OwlCarousel")
			}
		}

	},
	setShareUrl: function (imageId) {
	    var stateObj = { image: imageId };
	    history.replaceState(stateObj, imageId, "?" + imageId);
	    $(".social-sharing-bar").attr("data-shareurl", window.location.href);
	}
};

var chartSelector = {
	init: function () {

		var l2 = false,
			that = this,
			landingPage = (window.location.pathname.toLowerCase() === "/charts" || window.location.pathname.toLowerCase() === "/charts/" );

		//Open up parent category on pageload

		if(!landingPage){
			$(".chart-selector").addClass("on").each(function(){

				var $selectedChart = $(this).find(".chart-types-l2.selected").first(),
					$parent = $selectedChart.data("parent") ? $(".chart-types-l1.parent-" + $selectedChart.data("parent")) : null;

				if($parent && $parent.length > 0){			 	
				 	that.showChildren($parent, true)
				}else{
					that.showChildren($selectedChart.parents("ul").siblings("a")[0], true);
				}

			});						
		} else{ 
			$(".chart-selector").addClass("on");
		}

		$(".chart-selector .level-1 > li").on("click", "> a", function(e) {

			e.preventDefault();

			if(!l2){

				l2 = true;

				if(!$(this).hasClass("back")) {
					that.showChildren(this, false);
				}

			}

		})

		$(".chart-selector").on("click", ".back", function(e){

			e.preventDefault();

			var $back = $(this),
				deselect = $back.data("deselect")

			if(deselect){
				$back.siblings("a").removeClass("selected");
			}

			$back.siblings("ul").removeClass("on").parents("li").siblings().removeClass("off");

			if(deselect) {
				$back.remove();
			} else {
				$back.hide();
			}

			l2=false;
		});
	},
	showChildren: function(element, selectedOnLoad){

		var backButton = selectedOnLoad ? "<a class='back' href='#'>Back</a>" : "<a class='back' data-deselect='true' href='#'>Back</a>",
			$el = $(element);

		$el.addClass("selected").siblings("ul").addClass("on").parents("li").siblings().addClass("off");

		if($el.siblings(".back").length === 0) {
			$el.parent().prepend(backButton);
		}else{
			$el.siblings(".back").show();
		}

	}
}

var adLayout = {
	//Closes homepage whitespace caused by various ad formats
	init: function () {

		var that = this,
			resizeTimer;

		if($(".home-featured-articles").length > 0  ) {
			
			resizeTimer = setTimeout(function(){
				
				that.adjustHeights();

			},1500);

			$(window).resize( function () {

				clearTimeout(resizeTimer);

				resizeTimer = setTimeout(function(){
					
					that.adjustHeights();

				}, 500);

			});
		}
	},	
	adjustHeights: function () {
			
		var sidebarHeight = $(".sidebar-grey").height(),
			featuredArticlesHeight = $(".home-featured-articles").height(),
		 	diff = sidebarHeight - featuredArticlesHeight;

		if($(window).width() > 960 && diff > 10){
			$(".home-non-featured-articles").css({marginTop: diff * -1 })
		} else {
			$(".home-non-featured-articles").css({marginTop: 0 })
		}
	},
	pageSkinCallback: function () {	
		if($(".home-featured-articles").length > 0  ) {
			this.adjustHeights();
		}
	}
};

var chartActions = {
	init: function () {
		$(".chart-positions, .new-releases, .artist-products, .search-results-chart").on("click", ".actions a", function(e){
			e.preventDefault();

			var $this = $(this),
				$context = $this.parents("table"),
				$affiliateLinkGroup,
				$affiliateLinkSpotify,
				$affiliateLinkDeezer,
				$affiliateLink,
				spotifytrackID,
				deezertrackID;


			$context.find(".actions-view.on").removeClass("on").find(".player-spotify, .player-deezer").remove();

			if (!($this.hasClass("on"))) {
				$context.find(".actions a").removeClass("on");
				$this.addClass("on");
				$affiliateLinkGroup = $context.find("."+$(this).data("toggle"));
				$affiliateLinkGroup.addClass("on");

				if($affiliateLinkGroup.hasClass("actions-view-listen")) {

					$affiliateLinkSpotify = $affiliateLinkGroup.find(".spotify");
					$affiliateLinkDeezer = $affiliateLinkGroup.find(".deezer");

					spotifytrackID = $affiliateLinkSpotify.attr("href").split("track/")[1];

					$affiliateLinkSpotify.hide().after("<iframe class=\"player-spotify\" src=\"https://embed.spotify.com/?uri=spotify:track:"+spotifytrackID+"\" width=\"300\" height=\"80\" frameborder=\"0\" allowtransparency=\"true\"></iframe>");

					deezertrackID = $affiliateLinkDeezer.attr("href").split("track/")[1];

					$affiliateLinkDeezer.hide().after("<iframe class=\"player-deezer\"scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" src=\"http://www.deezer.com/plugins/player?autoplay=false&playlist=false&width=300&height=80&cover=false&type=tracks&id="+deezertrackID+"&title=&app_id=140093\" width=\"300\" height=\"80\"></iframe>")
				}

			} else{
				$this.removeClass("on");
				$context.find("."+$(this).data("toggle")).removeClass("on").find(".player-spotify, .player-deezer").remove();
			}

		}).on("click",".actions-view .close", function(e){

			e.preventDefault();
			
			var $this = $(this),
				$context = $this.parents("table");			

			$context.find(".actions-view, .actions a").removeClass("on").find(".player-spotify, .player-deezer").remove();

		})
	}
};

var fitVids = {
	init: function(){
		if(typeof $.fn.fitVids === "function"){
			$(".article-content").fitVids();
		}
	}
};

$(document).ready( function () {
	mobileNav.init();
	stickyNav.init();
	searchOverlay.init();
	countdown.init();
	randomLookup.init();
	comments.init();
	miniCharts.init();
	tabs.init();
	chartRuns.init();
	accordion.init();
	dropdown.init();
	searchAutocomplete.init();
	sharingButtons.init();
	articleGallery.init();
	chartSelector.init();
	adLayout.init();
	chartActions.init();
	fitVids.init();
});
