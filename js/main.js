
var SPHERE = SPHERE || {};

(function($){

	// USE STRICT
	"use strict";
        
        SPHERE.initialize = {		
                
                pageTransition: function() {                     
                      			
			pageWrapper.animsition({
				inClass: 'fade-in',
                                outClass: 'fade-out',
                                inDuration: 1500,
                                outDuration: 800,
				linkElement : '#main-menu ul li a:not([target="_blank"]):not([href*="#"]):not([data-lightbox]):not([href^="mailto"]):not([href^="tel"]):not([href^="sms"]):not([href^="call"])',
				loading : true,                                 
                                loadingParentElement: 'body',
                                loadingClass: 'sk-spinner-pulse',
                                loadingInner: ''
			});
		},
        };
        
        SPHERE.header = {
            
                init: function(){
                    
                    SPHERE.header.superfish();
                    SPHERE.header.initDropdown();
                    SPHERE.header.menuTrigger();
                    SPHERE.header.onePageScroll();
                    SPHERE.header.customPageScroll();
                    SPHERE.header.goToTop(); 
                    SPHERE.header.initHeadhesive();
                },             
                
                superfish: function() {
                        
                    $( main_menu ).superfish({
                        
                        popUpSelector   : 'ul',
                        delay   : 250,
                        speed   : 350
                    });
                    
                },
                
                menuChildren: function() {
                    
                    var level_two = main_menu.find( 'ul > li > ul' );
                    var level_three = level_two.find( 'li > ul' );
            
                    main_menu.find( 'ul li:has(ul)' ).addClass( 'has-child' );
            
                    level_two.addClass( 'level-two' );
                    level_three.addClass( 'level-three' );
                    
                },
                
                dropdownInvert: function() {
                    
                    var submenus = main_menu.find( 'ul ul' );
            
                    submenus.each( function ( index, element ) {
                
                        var menuDropdown    = $( element );
                        var windowWidth     = $( window ).width();

                        var dropdownOffset  = menuDropdown.offset();
                        var dropdownWidth   = menuDropdown.width();
                        var dropdownLeft    = dropdownOffset.left;

                        if ( windowWidth - ( dropdownWidth + dropdownLeft ) < 0 ) {
                            menuDropdown.addClass( 'invert-dropdown' );
                        }
                    });                    
                },
                
                initDropdown: function() {
                     
                    if ( $().superfish ) {
                       
                        if( main_menu.has( 'ul ul' ) ) {

                            var submenus = main_menu.find( 'ul ul' );

                            submenus.css( 'display', 'block' );
                            SPHERE.header.dropdownInvert();
                            SPHERE.header.menuChildren();
                            
                            submenus.css( 'display', '' );
                        }
                    }
                     
                },
                
                menuTrigger: function() {                 
            
                    if( menu_trigger.length > 0 ) {                        
                    
                        menu_trigger.on( 'click', function() {

                            $( this ).toggleClass( 'open' );
                            main_menu.toggleClass( 'display-menu' );

                        });
                    }                    
                },
               
                initHeadhesive: function() {
                    
                    if( headerEl.hasClass( 'sticky' ) ) {
                    
                        var options = {
                            offset: 200,
                            offsetSide: 'top',
                            classes: {
                                clone:   'header-clone',
                                stick:   'header-stick',
                                unstick: 'header-unstick'
                            },
                            
                            onInit:    function () {
                                
                                main_menu_clone = $( '#header.header-clone #main-menu' );                                 
                                menu_trigger_clone = $( '#header.header-clone #menu-trigger' );   
                                
                                main_menu_clone.superfish({
                                    
                                    popUpSelector   : 'ul',
                                    delay   : 250,
                                    speed   : 350
                                });
                                
                                if( menu_trigger_clone.length > 0 ) {                  
                                    
                                    menu_trigger_clone.on( 'click', ( function() {

                                        $( this ).toggleClass( 'open' );    
                                    
                                        main_menu_clone.toggleClass( 'display-menu' );                                        

                                    }));
                                
                                }
                                
                                $( main_menu_clone ).find( 'ul' ).on( 'click', function( e ) {
                        
                                    if ( $( e.target.tagName.toLowerCase() ).is( 'div' ) ) {

                                        var element = $( main_menu_clone ),
                                            divScrollToAnchor = $( e.target ).parent().attr('href'),
                                            divScrollSpeed = element.attr('data-speed'),
                                            divScrollOffset =  SPHERE.header.topScrollOffset(),
                                            divScrollEasing = element.attr('data-easing');   

                                        if( !divScrollSpeed ) { divScrollSpeed = 1250; }
                                        if( !divScrollEasing ) { divScrollEasing = 'easeInOutExpo'; }

                                        if( $( divScrollToAnchor ).length > 0 ) {

                                             element.find( 'li' ).removeClass( 'current' );
                                             element.find( 'a[href="' + divScrollToAnchor + '"]' ).parent( 'li' ).addClass( 'current' );

                                             $( 'html,body' ).stop( true ).animate({
                                                 'scrollTop': $( divScrollToAnchor ).offset().top - Number( divScrollOffset )
                                             }, Number( divScrollSpeed ), divScrollEasing );
                                        }

                                        if( windowWidth < 991  ) {

                                            menu_trigger_clone.toggleClass( 'open', false );
                                            main_menu_clone.toggleClass( 'display-menu', false );

                                        }

                                        return false;
                                    }

                                });                    
                                
                            },                            
                            
                        };

                        // Initialise with options
                        var stickyHeader = new Headhesive( '#header', options );
                   
                    }
                },
                
                topScrollOffset: function() {
                    
                    var topOffsetScroll = 0;
                    
                    if( headerEl.hasClass( 'sticky' ) ) {                        
                        topOffsetScroll = headerEl.attr('data-menu-height');
                        if( !topOffsetScroll ) { topOffsetScroll = 80; }
                        
                        if( windowWidth < 991  ) {
                            topOffsetScroll = headerEl.attr('data-mobile-menu-height');
                            if( !topOffsetScroll ) { topOffsetScroll = 70; }
                        }
                    }
                    else {
                        topOffsetScroll = 0; 
                    }                   
                    
                    return topOffsetScroll;
		},
                
                onePageScroll: function() {
                    
                    
                    $( main_menu ).find( 'a[href]' ).on( 'click', function() {
                                                      
                            var element = $( main_menu ),
                                divScrollToAnchor = $( this ).attr('href'),
                                divScrollSpeed = element.attr('data-speed'),
                                divScrollOffset =  SPHERE.header.topScrollOffset(),
                                divScrollEasing = element.attr('data-easing');   

                            if( !divScrollSpeed ) { divScrollSpeed = 1250; }
                            if( !divScrollEasing ) { divScrollEasing = 'easeInOutExpo'; }

                            if( $( divScrollToAnchor ).length > 0 ) {

                                 element.find( 'li' ).removeClass( 'current' );
                                 element.find( 'a[href="' + divScrollToAnchor + '"]' ).parent( 'li' ).addClass( 'current' );

                                 $( 'html,body' ).stop( true ).animate({
                                     'scrollTop': $( divScrollToAnchor ).offset().top - Number( divScrollOffset )
                                 }, Number( divScrollSpeed ), divScrollEasing );
                            }

                            if( windowWidth < 991  ) {

                                menu_trigger.toggleClass( 'open', false );
                                main_menu.toggleClass( 'display-menu', false );

                            }

                            return false;
                        
                    });                    
                    
                },
                
                customPageScroll: function() {
                    
                    
                    $( '.custom-scroll' ).on( 'click', function() {                     
                                                      
                            var divScrollToAnchor = $( this ).attr('href'),
                                divScrollSpeed = $( this ).attr('data-speed'),
                                divScrollOffset =  SPHERE.header.topScrollOffset(),
                                divScrollEasing = $( this ).attr('data-easing');   

                            if( !divScrollSpeed ) { divScrollSpeed = 1250; }
                            if( !divScrollEasing ) { divScrollEasing = 'easeInOutExpo'; }

                            if( $( divScrollToAnchor ).length > 0 ) {                              

                                 $( 'html,body' ).stop( true ).animate({
                                     'scrollTop': $( divScrollToAnchor ).offset().top - Number( divScrollOffset )
                                 }, Number( divScrollSpeed ), divScrollEasing );
                            }                          

                            return false;                       
                    });                    
                    
                },
                
                goToTop: function() {
                    
			var elementScrollSpeed = goToTopBtn.attr('data-speed'),
				elementScrollEasing = goToTopBtn.attr('data-easing');

			if( !elementScrollSpeed ) { elementScrollSpeed = 700; }
			if( !elementScrollEasing ) { elementScrollEasing = 'easeOutQuad'; }

			goToTopBtn.on( 'click', function() {
				$('body,html').stop(true).animate({
					'scrollTop': 0
				}, Number( elementScrollSpeed ), elementScrollEasing );
				return false;
			});
		},
                
                onePageCurrentSection: function() {
                    
                    var currentOnePageSection = '';      
                    var headerHeight = main_menu.outerHeight();

                    pageSection.each( function( index ) {                        
                        
                        var h = $(this).offset().top;
                        var y = $ ( window ).scrollTop();
                        var offsetScroll = headerHeight + Number( SPHERE.header.topScrollOffset() );                         
                      
                        if ( $(this).attr('id') != undefined && 
                                y + offsetScroll >= h && y < h + $(this).height() && 
                                $(this).attr('id') != currentOnePageSection ) {

                            currentOnePageSection = $(this).attr('id');                         
                        }

                    });

                    return currentOnePageSection;                    
                },
                
                onepageScroller: function() {
                    
                    var currentOnePageSection = SPHERE.header.onePageCurrentSection();

                    if ( currentOnePageSection !== '' ) {                       
                        
                        if( headerEl.hasClass( 'sticky' ) ) {            
                            main_menu_clone.find('li').removeClass('current');
                            main_menu_clone.find('a[href="#' + currentOnePageSection + '"]').parent('li').addClass('current');
                        }
                       
                        main_menu.find('li').removeClass('current');
                        main_menu.find('a[href="#' + currentOnePageSection + '"]').parent('li').addClass('current');
                          
                    }
                    
                },
                
                toggleMobileDropdownMenu: function() {
                    
                    
                    if( headerEl.hasClass( 'sticky' ) &&  menu_trigger.length > 0 && menu_trigger.hasClass( 'open' ) ) {

                        $( menu_trigger ).toggleClass( 'open' );                        
                        main_menu.toggleClass( 'display-menu' );                        
                    }

                    if( headerEl.hasClass( 'sticky' ) &&  menu_trigger_clone.length > 0 && menu_trigger_clone.hasClass( 'open' ) ) {

                        $( menu_trigger_clone ).toggleClass( 'open' );
                        main_menu_clone.toggleClass( 'display-menu' );
                    }
                    
                }
            
            
        };     
        
        SPHERE.slider = {            
            
            init: function() {
                
                sliderContainer.each( function() {
                    
                    SPHERE.slider.initializeSlider( this );
                   
                });

            },
            
            initializeSlider: function( sliderContainer ) {
                
                var carousel =  $( sliderContainer );               
                
                var owlcarousel_options =  {
                    
                    autoplay            : ( carousel.data( 'autoplay' ) == null ) ? false : carousel.data( 'autoplay' ),
                    autoplaySpeed       : ( carousel.data( 'autoplayspeed' ) == null ) ? false : carousel.data( 'autoplayspeed' ),
                    loop                : ( carousel.data( 'loop' ) == null ) ? false : carousel.data( 'loop' ),
                    items               : ( carousel.data( 'items' ) == null ) ? 1 : carousel.data( 'items' ),             
                    autoplayHoverPause  : ( carousel.data( 'stoponhover' ) == null ) ? false : carousel.data( 'stoponhover' ),
                    slideBy             : ( carousel.data( 'slideby' ) == null ) ? 1 : carousel.data( 'slideby' ),
                    nav                 : ( carousel.data( 'nav' ) == null ) ? false : carousel.data( 'nav' ),
                    navText             : [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],                    
                    navSpeed            : ( carousel.data( 'navspeed' ) == null ) ? false : carousel.data( 'navspeed' ),
                    dots                : ( carousel.data( 'dots' ) == null ) ? false : carousel.data( 'dots' ),
                    dotsSpeed           : ( carousel.data( 'dotsspeed' ) == null ) ? false : carousel.data( 'dotsspeed' ),
                    animateOut          : ( carousel.data( 'animateout' ) == null ) ? false : carousel.data( 'animateout' ),
                    animateIn           : ( carousel.data( 'animatein' ) == null ) ? false : carousel.data( 'animatein' ),
                    autoHeight          : true,
                    margin              : ( carousel.data( 'margin' ) == null ) ? false : carousel.data( 'margin' ),
                    stagePadding        : ( carousel.data( 'stagepadding' ) == null ) ? false : carousel.data( 'stagepadding' ),
                    responsive: {
                           0: {
                               items: ( carousel.data( 'items-mobile-portrait' ) == null ) ? 1 : carousel.data( 'items-mobile-portrait' )
                           },
                           480: {
                               items: ( carousel.data( 'items-mobile-landscape' ) == null ) ? 1 : carousel.data( 'items-mobile-landscape' )
                           },
                           768: {
                               items: ( carousel.data( 'items-tablet' ) == null ) ? 1 : carousel.data( 'items-tablet' )
                           },
                           960: {
                               items: ( carousel.data( 'items' ) == null ) ? 1 : carousel.data( 'items' )
                           }
                    }              
                }   
                
                $( '<div class="owl-slider-loading"></div>' ).insertAfter( carousel );
                        
                carousel.imagesLoaded()
                    .done( function() {
                        carousel.next( '.owl-slider-loading' ).remove();
                        carousel.owlCarousel( owlcarousel_options ); 
                    });
            },
            
        };
        
        SPHERE.portfolio = {

            init: function() {
                
                portfolioContainers.each( function() {
                    
                    SPHERE.portfolio.initializePortfolio( this );
                    
                });

            },
            
            initializePortfolio: function( portfolioContainer ) {
                
                var  portfolioGrid = $( portfolioContainer );
                
                var cubeportfolio_options =  {                    
                    filters             : '#filters-container',                    
                    layoutMode          : ( portfolioGrid.data( 'layoutmode' ) == null ) ? 'grid' : portfolioGrid.data( 'layoutmode' ),
                    sortToPreventGaps   : true,
                    mediaQueries: [{
                                width: 1500,
                                cols: ( portfolioGrid.data('large-desktop' ) == null ) ? 4 : portfolioGrid.data( 'large-desktop' )
                            }, {
                                width: 1100,
                                cols: ( portfolioGrid.data( 'medium-desktop' ) == null ) ? 3 : portfolioGrid.data( 'medium-desktop' )
                            }, {
                                width: 800,
                                cols: ( portfolioGrid.data( 'tablet' ) == null ) ? 3 : portfolioGrid.data( 'tablet' )
                            }, {
                                width: 480,
                                cols: ( portfolioGrid.data( 'mobile-landscape' ) == null ) ? 2 : portfolioGrid.data( 'mobile-landscape' )
                            }, {
                                width: 320,
                                cols: ( portfolioGrid.data( 'mobile-portrait' ) == null ) ? 1 : portfolioGrid.data( 'mobile-portrait' )
                            }],
                    defaultFilter       : portfolioGrid.data( 'defaultfilter' ),
                    animationType       : portfolioGrid.data( 'animationtype' ),
                    gapHorizontal       : ( portfolioGrid.data( 'gaphorizontal' ) == null ) ? 0 : portfolioGrid.data( 'gaphorizontal' ),
                    gapVertical         : ( portfolioGrid.data( 'gapvertical' ) == null ) ? 0   : portfolioGrid.data( 'gapvertical' ),
                    gridAdjustment      : 'responsive',
                    caption             : ( portfolioGrid.data( 'captionanimation' ) == null ) ? 'fadeIn' : portfolioGrid.data( 'captionanimation' ),
                    displayType         : ( portfolioGrid.data( 'displaytype' ) == null ) ? 'fadeIn' : portfolioGrid.data( 'displaytype' ),
                    displayTypeSpeed    : 100,
                    // lightbox
                    lightboxDelegate    : '.cbp-lightbox',
                    lightboxGallery     : true,
                    lightboxTitleSrc    : 'data-title',
                    lightboxCounter     : '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
                    plugins             : {
                                            loadMore: {
                                                element: '#more-projects',
                                                action: portfolioGrid.data( 'loadmoreaction' ),
                                                loadItems: portfolioGrid.data( 'loadnoofitems' ),
                                            }
                                          },
                };

                // Portfolio 
                portfolioGrid.cubeportfolio( cubeportfolio_options );          
                
            }                
                
        };
        
        SPHERE.widget = {
            
            init: function() {                
                
                if ( typeof ( google ) !== 'undefined' ) {
                   
                    googleMap.each( function() {
			SPHERE.widget.initializeMap( this );
                    });                   
                }
                
                if( socialShareLinks.length > 0 ) {
                
                    socialShareLinks.on( 'click', function() {

                       var network = $(this).data( 'network' );
                       var shareurl = $(this).data( 'shareurl' );

                       SPHERE.widget.socialShareDialog( network, shareurl );

                        return false;
                    });
                }                
                                              
                SPHERE.widget.easeScroll();              
                                            
                SPHERE.widget.statsCounter();
                
                SPHERE.widget.iziIframeVideoModal();
                
                dataBGImages.each( function() {
                    SPHERE.widget.bgImageCSS( this );
                });  
                
                SPHERE.widget.contactForm();
                
                SPHERE.widget.initParallax();
                                 
            },
            
            socialShareDialog: function( network, shareurl ) {
                
                var social_networks = {
                                        facebook   : 'http://www.facebook.com/sharer.php?u=',
                                        twitter    : 'https://twitter.com/share?url=',
                                        googleplus : 'https://plus.google.com/share?url=',
                                        linkedin   : 'http://www.linkedin.com/shareArticle?mini=true&amp;url=',
                                        xing       : 'https://www.xing.com/spi/shares/new?url=',
                                        pinterest  : 'http://pinterest.com/pin/create/link/?url='
                                   }
                    
                var width  = 575,
                            height = 520,
                            left   = ( $( window ).width()  - width )  / 2,
                            top    = ( $( window ).height() - height ) / 2,
                            opts   = 'status=1' +
                                     ',width='  + width  +
                                     ',height=' + height +
                                     ',top='    + top    +
                                     ',left='   + left;

                var url = social_networks[ network ] + shareurl;                    

                var newwindow = window.open( url , '', opts );

                if ( window.focus ) {
                    newwindow.focus();
                }
                
            },
            
            initializeMap: function( google_map ) {
            
                var latitude       = $( google_map ).data( 'latitude' );
                var longitude      = $( google_map ).data( 'longitude' );
                var zoom           = $( google_map ).data( 'zoom' );        
                var map_marker_img = $( google_map ).data( 'mapmarker' );

                var map_options = {
                    center: new google.maps.LatLng( latitude, longitude ),
                    zoom: zoom,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    mapTypeControl: false,
                    panControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    zoomControl: false
                };

                var map = new google.maps.Map( google_map, map_options );

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng( latitude, longitude ),
                    map: map,            
                    icon: map_marker_img
                });        

                //map.setOptions( { styles: JSON.parse( sphereMainJs.mapStyle.toString() ) } );
                var styles = [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
            map.setOptions( {styles: styles} );
            },
            
            easeScroll: function() {
                
               $( 'html' ).easeScroll();
                
            },
            
            bgImageCSS: function( element ) {
                
                $( element ).css( 'background-image', 'url(' + $( element ).data( "bg-image" ) + ') ' );
                
            },
            
            statsCounter: function() {
                
                $( '.counter' ).each( function() {
                    
                        var counter = null;
                        
			$( this ).waypoint( function() {
                            
                                var target = $( this ).find( '.counter-content' ).data( 'id' );
                                var startVal = $( this ).find( '.counter-content' ).data( 'start-val' );
                                var endVal = $( this ).find( '.counter-content' ).data( 'end-val' ) + ' ';
                                var decimal = $( this ).find( '.counter-content' ).data( 'decimal' );
                                var duration = Number( $( this ).find( '.counter-content' ).data( 'duration' ) );
                                var separator = $( this ).find( '.counter-content' ).data( 'separator' );
                            	                               
				var dec_count = endVal.split( '.' );
                                
                                if( startVal == null ) {
                                    startVal = 0;
                                }
                                
				if( dec_count[1] ) {
                                    dec_count = dec_count[1].length-1;
				} else {
                                    dec_count = 0;
				}
                                
				var grouping = true;				
                                
				if( separator == 'none' ) {
                                    grouping = false;
				} else {
                                    grouping = true;
				}
                                
				var settings = {
                                    useEasing : true,
                                    useGrouping : grouping,
                                    separator : separator,
                                    decimal : decimal
				}
                                
                                if( counter == null ) {                                   
                                
                                    counter = new CountUp( target, startVal, parseFloat( endVal ), dec_count, duration, settings );
                                    
                                    setTimeout( function() {
                                        counter.start();
                                    }, 500 );                                
                                }
                                                                
			},
                        {
                           offset: "85%"
                        });
                
		});
                
            },
            
            iziIframeVideoModal: function() {
                
                $( document ).on( 'click', '.trigger-iframe', function ( event ) {
                    
                    event.preventDefault();
                                    
                    var sphere_modal = $( '#sphere-modal-video' ).iziModal({
                      
                        headerColor: '#000',
                        background: 'black',
                        title: $( this ).data( 'title' ),                      
                        icon: 'icon-settings_system_daydream',
                        overlayClose: true,
                        iframe : true,
                        iframeURL: $( this ).data( 'url' ),
                        fullscreen: true,
                        openFullscreen: false,
                        borderBottom: false,
                        group: 'grupo1',
                        
                    });
                    
                    sphere_modal.iziModal( 'open' );
                    
                });
            },
            
            contactForm: function() {     
                
                contactForm.on( 'submit', function( event ) {
                    
                    var action_url      = contactForm.attr( 'action' );
                    var form_process    = contactForm.find( '.form-process' );
            
                    var name_error      = contactForm.find( '.name.contact-error-msg' );
                    var email_error     = contactForm.find( '.email.contact-error-msg' );
                    var message_error   = contactForm.find( '.message.contact-error-msg' );

                    var contact_success = contactForm.find( '.contact-success' );
                    var contact_failed  = contactForm.find( '.contact-failed' );

                    form_process.fadeIn();

                    name_error.removeClass( 'validation-error' );
                    email_error.removeClass( 'validation-error' );
                    message_error.removeClass( 'validation-error' );

                    contact_failed.removeClass( 'validation-error' );            
                    contact_success.removeClass( 'validated' );
          
                    // get the form data            
                    var formData = {
                        'name'   : contactForm.find( 'input[name=name]' ).val(),
                        'email'  : contactForm.find( 'input[name=email]' ).val(),               
                        'subject' : contactForm.find( 'input[name=subject]' ).val(),     
                        'message': contactForm.find( 'textarea[name=message]' ).val()
                    };

                    // process the form
                    $.ajax({
                        type: 'POST',
                        url: action_url,
                        data: formData,
                        dataType: 'json',
                        encode: true
                    })
              
                    // using the done promise callback
                    .done( function( data ) {

                        // here we will handle errors and validation messages
                        if ( !data.success ) {

                           // handle errors for name
                            if ( data.errors.name ) {
                                name_error.toggleClass( 'validation-error' );
                            }

                            // handle errors for email
                            if ( data.errors.email ) {
                                email_error.toggleClass( 'validation-error' );
                            }

                            // handle errors for message
                            if ( data.errors.message ) {
                                message_error.toggleClass( 'validation-error' );
                            }

                            // mail
                            if ( data.errors.mail_error ) {
                                contact_failed.toggleClass( 'validation-error' );
                            }                  
                        }
                        else {
                            contact_success.toggleClass( 'validated' );
                        }

                        form_process.fadeOut();

                    })            
                    .fail( function( data ) {

                        form_process.fadeOut();
                        contact_failed.toggleClass( 'validation-error' );

                    });
                    
                    event.preventDefault();
                     
                });
                
            },
            
            initParallax : function() {
                
                $( '[data-sphere-parallax]' ).each( function() { 
                    
                    var skrollrSpeed, skrollrSize, skrollrStart, skrollrEnd, $parallaxElement, parallaxImage;                    
                   
                    skrollrSize = 100 * $(this).data("sphereParallax"), 
                    $parallaxElement = $("<div />").addClass( "parallax-inner" ).appendTo( $(this) ), 
                    $parallaxElement.height( skrollrSize + "%" ),
                    parallaxImage = $(this).data("parallaxImage"),
                    $parallaxElement.css("background-image", "url(" + parallaxImage + ")"),
                    skrollrSpeed = skrollrSize - 100, 
                    skrollrStart = -skrollrSpeed, 
                    skrollrEnd = 0, 
                    $parallaxElement.attr("data-bottom-top", "top: " + skrollrStart + "%;").attr("data-top-bottom", "top: " + skrollrEnd + "%;")
                               
                });
                
                skrollr.init({
                    
                    forceHeight: false,
                    smoothScrolling: false,
                    mobileCheck: function() {
                        return false
                    }
                    
                });
                
            },
            
        };
        
        SPHERE.documentOnResize = {

		init: function(){
                    windowWidth = $( window ).width();
		}

	};
       
        
        SPHERE.documentOnReady = {           
            
            init: function() {
                
                SPHERE.initialize.pageTransition();
                SPHERE.header.init();
                SPHERE.slider.init();   
                SPHERE.widget.init();
                SPHERE.documentOnReady.windowscroll();
                
            },
            
            windowscroll: function() {             
                
                $( window ).on( 'scroll', function() { 
                    
                    SPHERE.header.toggleMobileDropdownMenu();
                   
                    SPHERE.header.onepageScroller();
                });
            }
    
        };

        SPHERE.documentOnLoad = {

            init: function(){
                SPHERE.portfolio.init();             
            },
	};
        
        var pageWrapper = $( '#page-wrapper.animsition' );
        var headerEl = $( '#header.standard' );
        var main_menu = $( '#main-menu' );      
        var menu_trigger = $( '#menu-trigger' );
        var pageSection = $( 'div[data-section="true"]' ); 
        var goToTopBtn = $('#gotoTop');
        var sliderContainer    = $( '.sphere-carousel' );
        var portfolioContainers = $('[id^=portfolio-container]');
        var socialShareLinks = $( '.social-share a' );     
        var googleMap =  $('[id^=googleMap]');   
        var contactForm =  $( '#contact-form' );       
        var dataBGImages = $('[data-bg-image]');    
        var windowWidth = $( window ).width();
        var main_menu_clone;     
        var menu_trigger_clone;
       
        
    $( document ).on( 'ready', SPHERE.documentOnReady.init );    
    $( window ).on( 'load', SPHERE.documentOnLoad.init );    
    $( window ).on( 'resize', SPHERE.documentOnResize.init );
        
        
})(jQuery);     
