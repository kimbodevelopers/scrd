(function($) {
  $(document).ready(function () {
    $('.dropdown-menu').click(function (event) {
      event.stopPropagation();
    });

    const searchFunction = () => {
      $('.search-wrapper').click(function() {
        if(!$('.search-container').hasClass('show-search')) {
          $('.search-container').addClass('show-search');
          $('html').css({'overflow' : 'hidden'})

        } else {
          $('.search-container').removeClass('show-search')
          $('html').css({'overflow' : 'unset'})
        }
      })

      $('.close-search').click(function() {
        if($('.search-container').hasClass('show-search')) {
          $('.search-container').removeClass('show-search');
          $('html').css({'overflow' : 'unset'})

        } else {
          $('.search-container').addClass('show-search')
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
  
          }
        })
      }
      
      let hoverMenuItemsHide = () => {
        $('.menu-item').mouseleave(function() {
          let targetedNavItem = $(this).attr('id');
  
          if(targetedNavItem) {
  
            $(this).find('.nav-link').removeClass('show')
            $(this).find('.nav-link').attr('aria-expanded', 'false')
            $(this).find('.sub-menu').removeClass('show')
            $(this).find('.sub-menu').attr('data-bs-popper', '')
  
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

    searchFunction();
    menuHover();

    
});
})(jQuery);
