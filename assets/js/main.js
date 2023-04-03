(function($) {
	$(document).ready(function () {
		const navigation = () => {
			$('.dropdown-menu').click(function (event) {
				event.stopPropagation();
			});


			const linkClick = () => {
				$('.navbar .dropdown-menu .accordion-button a').on('click', function(e) {
					e.preventDefault()
					if(e.target.href) {
						window.location = e.target.href
					}
				})
			}
			
			const externalNavLink = () => {
				$('.external-link a').each(function() {
					$(this).attr("target","_blank");
				})
			}

			linkClick();
			externalNavLink();
		}
		const notificationBar = () => {
			
			const d = new Date();
			const currentTime = d.getTime();
			const savedTime = localStorage.getItem('savedTime');
			const visited = localStorage.getItem('visited');
			const secondsInDay = 86400000;
			
			$(document).ready(function() {
				if($('.notification-bar-container').length > 0 ) {
					let notificationBarHeight = $('.notification-bar-container').height() + 10;

					$('.extra-padding').css({'padding-top' : notificationBarHeight + 'px'})
									
				}
			})
			
			
			
			if(visited === 'true') {
				$('.notification-bar-container').addClass('hide-bar');
				$('.notification-bar-container').removeClass('show-bar');
				
				if($('main').hasClass('extra-padding')) {
					$('main').removeClass('extra-padding')
				}
			} 
			
			if(visited === null) {
				$('.notification-bar-container').removeClass('hide-bar');
				$('.notification-bar-container').addClass('show-bar');
				
				if(!$('main').hasClass('extra-padding')) {
					$('main').addClass('extra-padding')
				}

			}
			
			if(currentTime > parseInt(savedTime) + secondsInDay) {
				localStorage.clear();
			}
			

			$('.notification-close-button').on('click', function() {
				localStorage.setItem('savedTime', currentTime)
				$('.notification-bar-container').fadeOut('slow');
				localStorage.setItem("visited", true);
				if($('main').hasClass('extra-padding')) {
					$('main').removeClass('extra-padding')
					$('main').css({'padding-top' : 'unset'})
				}
				
			})
			

			
		}
		


		const searchFunction = () => {
			$('.search-wrapper').click(function() {
				if(!$('.search-container').hasClass('show-search')) {
					$('.search-container').addClass('show-search');
					$('.search-container').removeClass('hide-search');

					$('.search-container').addClass('fade-in');
					$('.search-container').removeClass('fade-out');

					$('html').css({'overflow' : 'hidden'})

				} else {
					$('.search-container').removeClass('show-search')
					$('.search-container').removeClass('fade-in');
					$('.search-container').addClass('fade-out');
					$('html').css({'overflow' : 'unset'})

				}
			})
			
			$('.clear-search').click(function() {
				$('#searchInput').val('')
				fetchResults()
			})

			$('.close-search').click(function() {
				if($('.search-container').hasClass('show-search')) {

					$('.search-container').removeClass('show-search');
					$('.search-container').addClass('fade-out');

					setTimeout(function() {
						$('.search-container').addClass('hide-search');
					}, 600)

					$('.search-container').removeClass('fade-in');
					$('html').css({'overflow' : 'unset'})

				} else {
					$('.search-container').addClass('show-search')
					$('.search-container').removeClass('show-search')
					$('.search-container').removeClass('fade-out');
					$('.search-container').addClass('fade-in');
					$('html').css({'overflow' : 'hidden'})
				}
			})   
		}

		const menuHover = () => {

			let hoverMenuItemsShow = () => {
				$('.menu-item').mouseover(function() {
					let targetedNavItem = $(this).attr('id');

					if(targetedNavItem) {

						$(this).find('.nav-link').addClass('show')
						$(this).find('.nav-link').attr('aria-expanded', 'true')


						$(this).find('.sub-menu').addClass('show')
						$(this).find('.sub-menu').attr('data-bs-popper', 'static')


						$(this).find('.sub-menu').addClass('fade-in')
						$(this).find('.sub-menu').removeClass('fade-out')

					}
				})
			}

			let hoverMenuItemsHide = () => {
				$('.menu-item').mouseleave(function() {
					let targetedNavItem = $(this).attr('id');

					if(targetedNavItem) {

						setTimeout(() => {
							$(this).find('.nav-link').removeClass('show')
							$(this).find('.nav-link').attr('aria-expanded', 'false')
							$(this).find('.sub-menu').removeClass('show')
							$(this).find('.sub-menu').attr('data-bs-popper', '')

							$(this).find('.sub-menu').addClass('fade-out')
							$(this).find('.sub-menu').removeClass('fade-in')
						}, 300);




					}
				})
			}

			let clickMenuItemsShow = () => {
				$('.menu-item').click(function() {
					let targetedNavItem = $(this).attr('id');

					if(targetedNavItem) {
						$(this).find('.nav-link').addClass('show')
						$(this).find('.nav-link').attr('aria-expanded', 'true')
						$(this).find('.sub-menu').addClass('show')
						$(this).find('.sub-menu').attr('data-bs-popper', 'static')
					}
				})
			}

			let clickMenuItemsHide = () => {
				$('.menu-item').click(function() {
					let targetedNavItem = $(this).attr('id');

					if(targetedNavItem) {

						$(this).find('.nav-link').removeClass('show')
						$(this).find('.nav-link').attr('aria-expanded', 'false')
						$(this).find('.sub-menu').removeClass('show')
						$(this).find('.sub-menu').attr('data-bs-popper', '')

					}
				})
			}


			$(function() {
				if ($(window).width() >= 991) {


					$('#menu-main-navigation-menu >.menu-item a').attr('data-bs-toggle', '');
					hoverMenuItemsShow();
					hoverMenuItemsHide();
				} else {


					$('#menu-main-navigation-menu >.menu-item a .menu-image-title').click(function(e) {

						$(this).parent().attr('data-bs-toggle', '')
						$(this).parent()[0].click()
					})
				}
			})


			$(window).resize(function() {
				if ($(window).width() >= 991) {
					hoverMenuItemsShow();
					hoverMenuItemsHide();
					$('#menu-main-navigation-menu .menu-item a').attr('data-bs-toggle', '');

				} else {

					$('.menu-item').off().mouseleave()
					$('#menu-main-navigation-menu .menu-item a').attr('data-bs-toggle', '');

				}

			});

		}

		const titleHeight = () => {

			let maxHeightArray = [];

			$('.notification-information-row .notification-information-column .title-wrapper').each(function() {
				let maxHeight = $(this).height();
				maxHeightArray.push(maxHeight);
			})

			let max = Math.max(...maxHeightArray);

			$('.notification-information-row .notification-information-column .title-wrapper').height(max)
		}

		const meetingFilter = () => {
			$('.term-list_item').on('click', function() {
				$('.term-list_item').removeClass('active');
				$(this).addClass('active');


				$.ajax({
					type: 'POST',

					url: '/scrd/wp-admin/admin-ajax.php',
					dataType: 'html',


					data: {
						action: 'filter_meetings',
						term: $(this).data('slug'),
					},
					success: function(res) {
						$('.meeting-items').html(res);
					}
				})
			});
		}

		const parkFilter = () => {
			$('.reset-filter').on('click', function() {
				$('.parks-filter input[type=checkbox]').prop('checked', false)
			})
		}

		const tabsFunction = () => {
			// Show the first tab and hide the rest
			$('#tabs-nav li:first-child').addClass('active');
			$('.tab-content').hide();
			$('.tab-content:first').show();

			// Click function
			$('#tabs-nav .tab-item').click(function(){
				$('#tabs-nav .tab-item').removeClass('active');
				$(this).addClass('active');
				$('.tab-content').hide();

				var activeTab = $(this).find('a').attr('href');
				$(activeTab).fadeIn();
				return false;
			});
		}

		const readMore = () => {
			
				
				if($('.p2-row').length >=1 ) {

					let rows = $('.p2-row')

						$(document).ready(function() {
							for(let i = 0; i <= rows.length - 1; i++) {

								let contentHeight = $(this).find(rows[i]).find('.content-wrapper .p2-content').height();
															
								if(contentHeight < 300) {

									$(this).find(rows[i]).find('.read-more-expand').hide()
									$(this).find(rows[i]).find('.read-less-collapse').hide();
									$(this).find(rows[i]).find('.content-overlay').hide();
								}

							}

						})



				}

				if($('.p2-row-reverse').length >= 1 ) {

					let rows2 = $('.p2-row-reverse')

					$(document).ready(function() {
						for(let i = 0; i <= rows2.length - 1; i++) {

							let contentHeight = $(this).find(rows2[i]).find('.content-wrapper .p2-content').height();

							if(contentHeight < 300) {

								$(this).find(rows2[i]).find('.read-more-expand').hide()
								$(this).find(rows2[i]).find('.read-less-collapse').hide();
								$(this).find(rows2[i]).find('.content-overlay').hide();
							}

						}

					})
				}

			

			$(this).on('click', function(e) {

				if($(e.target).hasClass('read-more-expand')) {

					$(e.target).parent('.content-column').find('.p2-content').removeClass('content-200');
					$(e.target).parent('.content-column').find('.p2-content').addClass('content-max');
					$(e.target).parent('.content-column').find('.p2-content').addClass('p4-slide-down');
					$(e.target).parent('.content-column').find('.p2-content').removeClass('p4-slide-up');

					$(e.target).parent('.content-column').find('.content-overlay').removeClass('content-gradient-on');
					$(e.target).parent('.content-column').find('.content-overlay').addClass('content-gradient-off');

					$(e.target).parent('.content-column').find('.read-more-expand').hide()
					$(e.target).parent('.content-column').find('.read-less-collapse').show()

				}

				if($(e.target).hasClass('read-less-collapse')) {

					$(e.target).parent().find('.p2-content').addClass('content-200');
					$(e.target).parent().find('.p2-content').removeClass('content-max')
					$(e.target).parent().find('.p2-content').addClass('p4-slide-up');
					$(e.target).parent().find('.p2-content').removeClass('p4-slide-down');

					$(e.target).parent().find('.content-overlay').addClass('content-gradient-on');

					$(e.target).parent().find('.content-overlay').removeClass('content-gradient-off');

					$(e.target).parent('.content-column').find('.read-more-expand').show()
					$(e.target).parent('.content-column').find('.read-less-collapse').hide()
				}

			})

		}

		const documentLibrary = () => {
			// hide doc library
			$(document).on('facetwp-loaded', function() {
				$('.facetwp-type-dropdown select').each(function () {
					if ($(this).children('option').length == 1) {
						$(this).closest('.facetwp-type-dropdown').hide();
					} else {
						$(this).closest('.facetwp-type-dropdown').show();
					}
				});
			})

			$('.document-reset').click(function() {
				window.location.href = $(location).attr('href')
			})

			setTimeout(function() {
				let mediaOption = $('.facetwp-facet-type[data-name="type"]').find('[value="attachment"]')
				let mediaOptionArray = mediaOption.text().split(' ');
				mediaOptionArray[0] = 'Document';
				mediaOption.text(mediaOptionArray.join(' '));

			}, 300)
		}
		
	

		navigation();
		notificationBar();
		searchFunction();
		// menuHover();
		titleHeight();
		meetingFilter();
		parkFilter();
		tabsFunction();
		readMore();
		documentLibrary();
	});
})(jQuery);