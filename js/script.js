/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


/**
* Place your code here.
*/

Drupal.behaviors.siteNameTypography = {
		attach: function () {

		// Gets copy from site name (ultimately inside a span: #site-name a span)
		var siteName = $(".site-name p").text();

		var typographyAnd = siteName.replace("and", "<span class=\"diminutive-type\">and</span>");
		
		var typographyCollegeOf = typographyAnd.replace("College of", "<span class=\"diminutive-type\">College of</span>");
		var typographyDepartmentOf = typographyAnd.replace("Department of", "<span class=\"diminutive-type\">Department of</span>");
		var typographyDivisionOf = typographyAnd.replace("Division of", "<span class=\"diminutive-type\">Division of</span>");
		var typographyOfficeOf = typographyAnd.replace("Office of", "<span class=\"diminutive-type\">Office of</span>");

		$('.site-name p span:contains(College of)').replaceWith(typographyCollegeOf);
		$('.site-name p span:contains(Department of)').replaceWith(typographyDepartmentOf);
		$('.site-name p span:contains(Division of)').replaceWith(typographyDivisionOf);
		$('.site-name p span:contains(Office of)').replaceWith(typographyOfficeOf);
	}
}



	Drupal.behaviors.searchSlider = {
		attach: function () {

	// START SEARCH TOGGLE CODE

		$('.western-search > button').click(function () {
			var search = $('.western-search-widget');
			if (search.is(':visible')) {
				search.hide("slide", { direction: "right" }, 400);
			} else {
				search.show("slide", { direction: "right" }, 200);
		}
	});
	// END SEARCH TOGGLE CODE
	}
}

	Drupal.behaviors.mobileWwuMenu = {
		attach: function () {

	// START QUICK LINKS TOGGLE CODE

		$('.western-quick-links button').click(function () {
			var quicklinks = $('.western-quick-links ul');
			if (quicklinks.is(':visible')) {
				quicklinks.hide("slide", { direction: "right" }, 400);
			} else {
				quicklinks.show("slide", { direction: "right" }, 200);
		}
	});
	// END QUICK LINKS TOGGLE CODE
    }
 }

	// START MAIN MENU TOGGLE CODE
	Drupal.behaviors.mobileWwuMainMenu = {
		attach: function () {

			$('.mobile-main-nav').click(function () {
				var mainMenu = $('.main-nav .menu');
				
				if (mainMenu.is(':visible')) {
					mainMenu.slideToggle();
				} else {
					mainMenu.slideToggle(400, function() {
						if (mainMenu.is(':visible')) {
							mainMenu.css('display', 'table');
						}
					});
				}
			});
			
		}
	}
	//END MAIN MENU TOGGLE CODE

	// START MENU EXPANSION CODE
	Drupal.behaviors.menuExpansion = {
		attach: function () {
		$(".expanded").click(function(e) {
		  if ($(this).hasClass("opened")) {
		    $(this).children().children().hide();
		    //$(this).parent().children().show();
		    $(this).removeClass("opened");
		    // Close all children as well
		    var x = $(this).children().children("li");
		    while (x.size() > 0) {
	      	x.removeClass("opened");
	      	x.children().children().hide();
	      	x = x.children().children("li");
	    	}
	   	} else {
	     	$(this).children().children().show();
	     	$(this).parent().children().not(this).removeClass("opened");
	     	$(this).parent().children().not(this).children().children().hide();
	     	$(this).addClass("opened");
	   	}
		  e.stopPropagation();
		});

	// END MENU EXPANSION CODE
	}
}

	// START MENU TOGGLE ON RESIZE EVENT
	Drupal.behaviors.toggleMenuOnResize = {
		attach: function () {
			var mainMenu = $('.main-nav div > .menu');
			var subMenus = $('.main-nav .menu .menu');
			
			$(window).resize(function() {
				if ($(window).width() > 800) {
					// Reset the display property for the main menu and child menus.
					mainMenu.css('display', '');
					subMenus.css('display', '');
				}
			});
			
		}
	}
	// END MENU TOGGLE ON RESIZE EVENT

//These next two behaviors do the exact same thing, on onLoad and one on resize

/*Drupal.behaviors.resizeHeaderOnLoad = {
  attach: function () {
  //START RESIZE COLLEGE HEADER AND SET HEIGHT CODE
  $(window).load(function () {
    var divHeight = $(".site-header").children().outerHeight(true);
    var menuHeight = $(".main-nav").outerHeight(true);
    //For the mobile views we need another container to use since main menu is collapsed
    var nameAndSlogan = $(".site-name").outerHeight(true);
    //add the two heights and 10 more pixels to compensate for space beneath the main menu
    var totalHeightWithMenu = divHeight + menuHeight + 10;
    var totalHeightSansMenu = divHeight + nameAndSlogan;
    //Testing for a condition forces the height to be calculated.
      if (totalHeightSansMenu <= 61) {
        totalHeightSansMenu = totalHeightSansMenu + 76;
        $('.site-header').css({'height': totalHeightSansMenu + "px"});
      } else if (totalHeightSansMenu <= 84) {
        totalHeightSansMenu = totalHeightSansMenu + 1;
        $('.site-header').css({'height': totalHeightSansMenu + "px"});
        } else {
          $('.site-header').css({'height': totalHeightWithMenu + "px"});
          }
    });
    //END RESIZE COLLEGE HEADER CODE
  }
}

Drupal.behaviors.resizeHeaderOnResize = {
  attach: function () {
  //START RESIZE COLLEGE HEADER AND SET HEIGHT CODE
  $(window).resize(function () {
    var divHeight = $(".site-header").children().outerHeight(true);
    var menuHeight = $(".main-nav").outerHeight(true);
    //For the mobile views we need another container to use since main menu is collapsed
    var nameAndSlogan = $(".site-name").outerHeight(true);
    //add the two heights and 10 more pixels to compensate for space beneath the main menu
    var totalHeightWithMenu = divHeight + menuHeight + 10;
    var totalHeightSansMenu = divHeight + nameAndSlogan;
    //Testing for a condition forces the height to be calculated.
      if (totalHeightSansMenu <= 61) {
        totalHeightSansMenu = totalHeightSansMenu + 76;
        $('.site-header').css({'height': totalHeightSansMenu + "px"});
      } else if (totalHeightSansMenu <= 84) {
        totalHeightSansMenu = totalHeightSansMenu + 1;
        $('.site-header').css({'height': totalHeightSansMenu + "px"});
        } else {
          $('.site-header').css({'height': totalHeightWithMenu + "px"});
          }
    });
    //END RESIZE COLLEGE HEADER CODE
  }
}*/


// Tooltips for the staff and faculty directories
Drupal.behaviors.userModuleIcons = {
  attach: function () {
    $('.user-module div').click(function(){
          if($(this).hasClass('tooltip')){
              $(this).removeClass('tooltip');
          } else {
              $(this).addClass('tooltip').siblings().removeClass('tooltip');
          }
      });
    }
  }



})(jQuery, Drupal, this, this.document);
