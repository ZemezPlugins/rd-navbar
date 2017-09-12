/**
 * @module       RD Navbar
 * @author       Evgeniy Gusarov
 * @see          https://ua.linkedin.com/pub/evgeniy-gusarov/8a/a40/54a
 * @version      2.2.5
 */
(function() {
  var isTouch;

  isTouch = "ontouchstart" in window;

  (function($, document, window) {

    /**
     * Creates a RDNavbar.
     * @class RDNavbar.
     * @public
     * @param {HTMLElement} element - The element to create the RDNavbar for.
     * @param {Object} [options] - The options
     */
    var RDNavbar;
    RDNavbar = (function() {

      /**
       * Default options for RDNavbar.
       * @protected
       */
      RDNavbar.prototype.Defaults = {
        layout: 'rd-navbar-static',
        deviceLayout: 'rd-navbar-fixed',
        focusOnHover: true,
        focusOnHoverTimeout: 800,
        linkedElements: ["html"],
        domAppend: true,
        stickUp: true,
        stickUpClone: true,
        stickUpOffset: '100%',
        anchorNav: true,
        anchorNavSpeed: 400,
        anchorNavOffset: 0,
        anchorNavEasing: 'swing',
        autoHeight: true,
        responsive: {
          0: {
            layout: "rd-navbar-fixed",
            deviceLayout: "rd-navbar-fixed",
            focusOnHover: false,
            stickUp: false
          },
          992: {
            layout: "rd-navbar-static",
            deviceLayout: "rd-navbar-static",
            focusOnHover: true,
            stickUp: true
          }
        },
        callbacks: {
          onToggleSwitch: false,
          onToggleClose: false,
          onDomAppend: false,
          onDropdownOver: false,
          onDropdownOut: false,
          onDropdownToggle: false,
          onDropdownClose: false,
          onStuck: false,
          onUnstuck: false,
          onAnchorChange: false
        }
      };

      function RDNavbar(element, options) {

        /**
         * Current options set
         * @public
         */
        this.options = $.extend(true, {}, this.Defaults, options);

        /**
         * Plugin element
         * @public
         */
        this.$element = $(element);

        /**
         * Plugin element clone
         * @public
         */
        this.$clone = null;

        /**
         * Additional references
         * @public
         */
        this.$win = $(window);
        this.$doc = $(document);
        this.currentLayout = this.options.layout;
        this.loaded = false;
        this.focusOnHover = this.options.focusOnHover;
        this.focusTimer = false;
        this.cloneTimer = false;
        this.isStuck = false;
        this.initialize();
      }


      /**
       * Initializes the RDNavbar.
       * @protected
       */

      RDNavbar.prototype.initialize = function() {
        var ctx;
        ctx = this;
        ctx.$element.addClass("rd-navbar").addClass(ctx.options.layout);
        if (isTouch) {
          ctx.$element.addClass("rd-navbar--is-touch");
        }
        if (ctx.options.domAppend) {
          ctx.createNav(ctx);
        }
        if (ctx.options.stickUpClone) {
          ctx.createClone(ctx);
        }
        ctx.$element.addClass('rd-navbar-original');
        ctx.addAdditionalClassToToggles('.rd-navbar-original', 'toggle-original', 'toggle-original-elements');
        ctx.applyHandlers(ctx);
        ctx.offset = ctx.$element.offset().top;
        ctx.height = ctx.$element.outerHeight();
        ctx.loaded = true;
        return ctx;
      };


      /**
       * Changes {ctx.$element} layout basing on screen resolution
       * @protected
       */

      RDNavbar.prototype.resize = function(ctx, e) {
        var targetElement, targetLayout;
        targetLayout = isTouch ? ctx.getOption('deviceLayout') : ctx.getOption('layout');
        targetElement = ctx.$element.add(ctx.$clone);
        if (targetLayout !== ctx.currentLayout || !ctx.loaded) {
          ctx.switchClass(targetElement, ctx.currentLayout, targetLayout);
          if (ctx.options.linkedElements != null) {
            $.grep(ctx.options.linkedElements, function(link, index) {
              return ctx.switchClass(link, ctx.currentLayout + '-linked', targetLayout + '-linked');
            });
          }
          ctx.currentLayout = targetLayout;
        }
        ctx.focusOnHover = ctx.getOption('focusOnHover');
        return ctx;
      };


      /**
       * Toggles bar stickup on scroll
       * @protected
       */

      RDNavbar.prototype.stickUp = function(ctx, e) {
        var scrollTop, stickUp, stickUpOffset, targetElement, threshold;
        stickUp = ctx.getOption("stickUp");
        if ($('html').hasClass('ios') || ctx.$element.hasClass('rd-navbar-fixed')) {
          stickUp = false;
        }
        scrollTop = ctx.$doc.scrollTop();
        targetElement = ctx.$clone != null ? ctx.$clone : ctx.$element;
        stickUpOffset = ctx.getOption('stickUpOffset');
        threshold = (typeof stickUpOffset === 'string' ? (stickUpOffset.indexOf('%') > 0 ? parseFloat(stickUpOffset) * ctx.height / 100 : parseFloat(stickUpOffset)) : stickUpOffset);
        if (stickUp) {
          if ((scrollTop >= threshold && !ctx.isStuck) || (scrollTop < threshold && ctx.isStuck)) {
            ctx.$element.add(ctx.$clone).find('[data-rd-navbar-toggle]').each(function() {
              $.proxy(ctx.closeToggle, this)(ctx, false);
            }).end().find('.rd-navbar-submenu').removeClass('opened').removeClass('focus');
            if (scrollTop >= threshold && !ctx.isStuck && !ctx.$element.hasClass('rd-navbar-fixed')) {
              if (ctx.options.callbacks.onStuck) {
                ctx.options.callbacks.onStuck.call(ctx);
              }


              setTimeout(function(){
                if (e.type === 'resize') {
                  ctx.switchClass(targetElement, '', 'rd-navbar--is-stuck');
                } else {
                  targetElement.addClass('rd-navbar--is-stuck');
                }
                ctx.isStuck = true;
              }, navigator.platform.match(/(Mac)/i) ? 10 : 0);

            } else {
              if (e.type === 'resize') {
                ctx.switchClass(targetElement, 'rd-navbar--is-stuck', '');
              } else {
                targetElement.removeClass('rd-navbar--is-stuck').one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', $.proxy(ctx.resizeWrap, ctx, e));
              }
              ctx.isStuck = false;
              if (ctx.options.callbacks.onUnstuck) {
                ctx.options.callbacks.onUnstuck.call(ctx);
              }
            }
          }
        } else {
          ctx.$element.find('.rd-navbar-submenu').removeClass('opened').removeClass('focus');
          if (ctx.isStuck) {
            ctx.switchClass(targetElement, 'rd-navbar--is-stuck', '');
            ctx.isStuck = false;
            ctx.resizeWrap(e);
          }
        }
        return ctx;
      };


      /**
       * Resizes an external wrap of navbar
       * @protected
       */

      RDNavbar.prototype.resizeWrap = function(e) {
        var $wrap, ctx;
        ctx = this;
        if ((ctx.$clone == null) && !ctx.isStuck) {
          $wrap = ctx.$element.parent();
          if (!ctx.getOption('autoHeight')) {
            $wrap.css('height', 'auto');
            return;
          }
          ctx.height = ctx.$element.outerHeight();
          if (e.type === 'resize') {
            $wrap.addClass('rd-navbar--no-transition').css('height', ctx.height);
            $wrap[0].offsetHeight;
            return $wrap.removeClass('rd-navbar--no-transition');
          } else {
            return $wrap.css('height', ctx.height);
          }
        }
      };


      /**
       * Creates additional DOM for navigation functionality
       * @protected
       */

      RDNavbar.prototype.createNav = function(ctx) {
        ctx.$element.find('.rd-navbar-dropdown, .rd-navbar-megamenu').each(function() {
          var $this, rect;
          $this = $(this);
          rect = this.getBoundingClientRect();
          if ($this.hasClass('rd-navbar-megamenu')) {
            return $this.parent().addClass('rd-navbar--has-megamenu');
          } else {
            return $this.parent().addClass('rd-navbar--has-dropdown');
          }
        }).parents("li").addClass("rd-navbar-submenu");
        $('<span class="rd-navbar-submenu-toggle"></span>').insertAfter('.rd-navbar-nav li.rd-navbar-submenu > a');
        if (ctx.options.callbacks.onDomAppend) {
          ctx.options.callbacks.onDomAppend.call(this);
        }
        return ctx;
      };


      /**
       * Creates navbar clone to stick up
       * @protected
       */

      RDNavbar.prototype.createClone = function(ctx) {
        ctx.$clone = ctx.$element.clone().insertAfter(ctx.$element).addClass('rd-navbar--is-clone');
        ctx.addAdditionalClassToToggles('.rd-navbar--is-clone', 'toggle-cloned', 'toggle-cloned-elements');
        return ctx;
      };


      /**
       * Closes all toggles on outside click of each item
       * @protected
       */

      RDNavbar.prototype.closeToggle = function(ctx, e) {
        var $items, $target, additionalToggleElClass, additionalToogleClass, collapse, linkedElements, needClose;
        $target = $(e.target);
        collapse = false;
        linkedElements = this.getAttribute('data-rd-navbar-toggle');
        if (ctx.options.stickUpClone && ctx.isStuck) {
          additionalToogleClass = '.toggle-cloned';
          additionalToggleElClass = '.toggle-cloned-elements';
          needClose = !$target.hasClass('toggle-cloned');
        } else {
          additionalToogleClass = '.toggle-original';
          additionalToggleElClass = '.toggle-original-elements';
          needClose = !$target.hasClass('toggle-original');
        }
        if (e.target !== this && !$target.parents(additionalToogleClass + '[data-rd-navbar-toggle]').length && !$target.parents(additionalToggleElClass).length && linkedElements && needClose) {
          $items = $(this).parents('body').find(linkedElements).add($(this).parents('.rd-navbar')[0]);
          $items.each(function() {
            if (!collapse) {
              return collapse = (e.target === this || $.contains(this, e.target)) === true;
            }
          });
          if (!collapse) {
            $items.add(this).removeClass('active');
            if (ctx.options.callbacks.onToggleClose) {
              ctx.options.callbacks.onToggleClose.call(this, ctx);
            }
          }
        }
        return this;
      };


      /**
       * Switches toggle
       * @protected
       */

      RDNavbar.prototype.switchToggle = function(ctx, e) {
        var additionalToggleElClass, linkedElements, navbarClass;
        e.preventDefault();
        if ($(this).hasClass('toggle-cloned')) {
          navbarClass = '.rd-navbar--is-clone';
          additionalToggleElClass = '.toggle-cloned-elements';
        } else {
          navbarClass = '.rd-navbar-original';
          additionalToggleElClass = '.toggle-original-elements';
        }
        if (linkedElements = this.getAttribute('data-rd-navbar-toggle')) {
          $(navbarClass + ' [data-rd-navbar-toggle]').not(this).each(function() {
            var deactivateElements;
            if (deactivateElements = this.getAttribute('data-rd-navbar-toggle')) {
              return $(this).parents('body').find(navbarClass + ' ' + deactivateElements + additionalToggleElClass).add(this).add($.inArray('.rd-navbar', deactivateElements.split(/\s*,\s*/i)) > -1 ? $(this).parents('body')[0] : false).removeClass('active');
            }
          });
          $(this).parents('body').find(navbarClass + ' ' + linkedElements + additionalToggleElClass).add(this).add($.inArray('.rd-navbar', linkedElements.split(/\s*,\s*/i)) > -1 ? $(this).parents('.rd-navbar')[0] : false).toggleClass('active');
        }
        if (ctx.options.callbacks.onToggleSwitch) {
          ctx.options.callbacks.onToggleSwitch.call(this, ctx);
        }
        return this;
      };


      /**
       * Triggers submenu popup to be shown on mouseover
       * @protected
       */

      RDNavbar.prototype.dropdownOver = function(ctx, timer) {
        var $this;
        if (ctx.focusOnHover) {
          $this = $(this);
          clearTimeout(timer);
          if (ctx.options.callbacks.onDropdownOver) {
            if (!ctx.options.callbacks.onDropdownOver.call(this, ctx)){
              return this;
            }
          }

          $this.addClass('focus').siblings().removeClass('opened').each(ctx.dropdownUnfocus);
        }
        return this;
      };


      /**
       * Triggers submenu popup to be shown on mouseover
       * @protected
       */

      RDNavbar.prototype.dropdownTouch = function(ctx, timer) {
        var $this, hasFocus;
        $this = $(this);
        clearTimeout(timer);
        if (ctx.focusOnHover) {
          hasFocus = false;
          if ($this.hasClass('focus')) {
            hasFocus = true;
          }
          if (!hasFocus) {
            $this.addClass('focus').siblings().removeClass('opened').each(ctx.dropdownUnfocus);
            return false;
          }
          if (ctx.options.callbacks.onDropdownOver) {
            ctx.options.callbacks.onDropdownOver.call(this, ctx);
          }
        }
        return this;
      };


      /**
       * Triggers submenu popop to be hidden on mouseout
       * @protected
       */

      RDNavbar.prototype.dropdownOut = function(ctx, timer) {
        var $this;
        if (ctx.focusOnHover) {
          $this = $(this);
          $this.one('mouseenter.navbar', function() {
            return clearTimeout(timer);
          });

          if (ctx.options.callbacks.onDropdownOut) {
            ctx.options.callbacks.onDropdownOut.call(this, ctx);
          }
          clearTimeout(timer);

          timer = setTimeout($.proxy(ctx.dropdownUnfocus, this, ctx), ctx.options.focusOnHoverTimeout);
        }
        return this;
      };


      /**
       * Removes a focus from submenu
       * @protected
       */

      RDNavbar.prototype.dropdownUnfocus = function(ctx) {
        var $this;
        $this = $(this);
        $this.find('li.focus').add(this).removeClass('focus');
        return this;
      };


      /**
       * Closes submenu
       * @protected
       */

      RDNavbar.prototype.dropdownClose = function(ctx, e) {
        var $this;
        if (e.target !== this && !$(e.target).parents('.rd-navbar-submenu').length) {
          $this = $(this);
          $this.find('li.focus').add(this).removeClass('focus').removeClass('opened');
          if (ctx.options.callbacks.onDropdownClose) {
            ctx.options.callbacks.onDropdownClose.call(this, ctx);
          }
        }
        return this;
      };


      /**
       * Toggles submenu popup to be shown on trigger click
       * @protected
       */

      RDNavbar.prototype.dropdownToggle = function(ctx) {
        $(this).toggleClass('opened').siblings().removeClass('opened');
        if (ctx.options.callbacks.onDropdownToggle) {
          ctx.options.callbacks.onDropdownToggle.call(this, ctx);
        }
        return this;
      };


      /**
       * Scrolls the page to triggered anchor
       * @protected
       */

      RDNavbar.prototype.goToAnchor = function(ctx, e) {
        var $anchor, hash;
        hash = this.hash;
        $anchor = $(hash);

        if (!ctx.getOption('anchorNav')){
          return false;
        }

        if ($anchor.length) {
          e.preventDefault();
          $('html, body').stop().animate({
            'scrollTop': $anchor.offset().top + ctx.getOption('anchorNavOffset') + 1
          }, ctx.getOption('anchorNavSpeed'), ctx.getOption('anchorNavEasing'), function() {
            return ctx.changeAnchor(hash);
          });
        }
        return this;
      };


      /**
       * Highlight an active anchor
       * @protected
       */

      RDNavbar.prototype.activateAnchor = function(e) {
        var $anchor, $item, $link, ctx, docHeight, hash, i, link, links, navOffset, scrollTop, winHeight;
        ctx = this;
        scrollTop = ctx.$doc.scrollTop();
        winHeight = ctx.$win.height();
        docHeight = ctx.$doc.height();
        navOffset = ctx.getOption('anchorNavOffset');

        if (!ctx.options.anchorNav){
          return false;
        }

        if (scrollTop + winHeight > docHeight - 50) {
          $anchor = $('[data-type="anchor"]').last();
          if ($anchor.length) {
            if ($anchor.offset().top >= scrollTop) {
              hash = '#' + $anchor.attr("id");
              $item = $('.rd-navbar-nav a[href^="' + hash + '"]').parent();
              if (!$item.hasClass('active')) {
                $item.addClass('active').siblings().removeClass('active');
                if (ctx.options.callbacks.onAnchorChange) {
                  ctx.options.callbacks.onAnchorChange.call($anchor[0], ctx);
                }
              }
            }
          }
          return $anchor;
        } else {
          links = $('.rd-navbar-nav a[href^="#"]').get();
          for (i in links) {
            link = links[i];
            $link = $(link);
            hash = $link.attr('href');
            $anchor = $(hash);
            if ($anchor.length) {
              if ($anchor.offset().top + navOffset <= scrollTop && $anchor.offset().top + $anchor.outerHeight() > scrollTop) {
                $link.parent().addClass('active').siblings().removeClass('active');
                if (ctx.options.callbacks.onAnchorChange) {
                  ctx.options.callbacks.onAnchorChange.call($anchor[0], ctx);
                }
              }
            }
          }
        }
        return null;
      };


      /**
       * Returns current anchor
       * @protected
       */

      RDNavbar.prototype.getAnchor = function() {
        if (history) {
          if (history.state) {
            return history.state.id;
          }
        }
        return null;
      };


      /**
       * Changes current page anchor
       * @protected
       */

      RDNavbar.prototype.changeAnchor = function(hash) {
        if (history) {
          if (history.state) {
            if (history.state.id !== hash) {
              history.replaceState({
                'anchorId': hash
              }, null, hash);
            } else {
              history.pushState({
                'anchorId': hash
              }, null, hash);
            }
          } else {
            history.pushState({
              'anchorId': hash
            }, null, hash);
          }
        }
        return this;
      };


      /**
       * Applies all JS event handlers
       * @protected
       */

      RDNavbar.prototype.applyHandlers = function(ctx) {
        if (ctx.options.responsive != null) {
          ctx.$win.on('resize.navbar', $.proxy(ctx.resize, ctx.$win[0], ctx)).on('resize.navbar', $.proxy(ctx.resizeWrap, ctx)).on('resize.navbar', $.proxy(ctx.stickUp, (ctx.$clone != null ? ctx.$clone : ctx.$element), ctx)).on('orientationchange.navbar', $.proxy(ctx.resize, ctx.$win[0], ctx)).trigger('resize.navbar');
        }
        ctx.$doc.on('scroll.navbar', $.proxy(ctx.stickUp, (ctx.$clone != null ? ctx.$clone : ctx.$element), ctx)).on('scroll.navbar', $.proxy(ctx.activateAnchor, ctx));
        ctx.$element.add(ctx.$clone).find('[data-rd-navbar-toggle]').each(function() {
          var $this;
          $this = $(this);
          $this.on('click', $.proxy(ctx.switchToggle, this, ctx));
          return $this.parents('body').on('click', $.proxy(ctx.closeToggle, this, ctx));
        });
        ctx.$element.add(ctx.$clone).find('.rd-navbar-submenu').each(function() {
          var $this, timer;
          $this = $(this);
          timer = $this.parents(".rd-navbar--is-clone").length ? ctx.cloneTimer : ctx.focusTimer;
          $this.on('mouseleave.navbar', $.proxy(ctx.dropdownOut, this, ctx, timer));
          $this.find('> a').on('mouseenter.navbar', $.proxy(ctx.dropdownOver, this, ctx, timer));
          $this.find('> a').on('touchstart.navbar', $.proxy(ctx.dropdownTouch, this, ctx, timer));
          $this.find('> .rd-navbar-submenu-toggle').on('click', $.proxy(ctx.dropdownToggle, this, ctx));
          return $this.parents('body').on('click', $.proxy(ctx.dropdownClose, this, ctx));
        });
        ctx.$element.add(ctx.$clone).find('.rd-navbar-nav a[href^="#"]').each(function() {
          return $(this).on('click', $.proxy(ctx.goToAnchor, this, ctx));
        });

        ctx.$element.find('.rd-navbar-dropdown, .rd-navbar-megamenu').each(function() {
          var $this, rect;
          $this = $(this);
          rect = this.getBoundingClientRect();
          if ((rect.left + $this.outerWidth()) >= window.innerWidth - 10) {
            this.className += ' rd-navbar-open-left';
          } else if ((rect.left - $this.outerWidth()) <= 10) {
            this.className += ' rd-navbar-open-right';
          }
        });

        return ctx;
      };


      /**
       * Switches classes of elements without transition
       * @protected
       */

      RDNavbar.prototype.switchClass = function(element, before, after) {
        var obj;
        obj = element instanceof jQuery ? element : $(element);
        obj.addClass('rd-navbar--no-transition').removeClass(before).addClass(after);
        obj[0].offsetHeight;
        return obj.removeClass('rd-navbar--no-transition');
      };


      /**
       * Gets specific option of plugin
       * @protected
       */

      RDNavbar.prototype.getOption = function(key) {
        var point, targetPoint;
        for (point in this.options.responsive) {
          if (point <= window.innerWidth) {
            targetPoint = point;
          }
        }
        if ((this.options.responsive != null) && (this.options.responsive[targetPoint][key] != null)) {
          return this.options.responsive[targetPoint][key];
        } else {
          return this.options[key];
        }
      };


      /**
       * Add additional class to navbar toggles to identify it when navbar is cloned
       * @protected
       */

      RDNavbar.prototype.addAdditionalClassToToggles = function(navbarClass, toggleAdditionalClass, toggleElAdditionalClass) {
        return $(navbarClass).find('[data-rd-navbar-toggle]').each(function() {
          var toggleElement;
          $(this).addClass(toggleAdditionalClass);
          toggleElement = this.getAttribute('data-rd-navbar-toggle');
          return $(this).parents('body').find(navbarClass).find(toggleElement).addClass(toggleElAdditionalClass);
        });
      };

      return RDNavbar;

    })();

    /**
     * The jQuery Plugin for the RD Navbar
     * @public
     */
    $.fn.extend({
      RDNavbar: function(options) {
        var $this;
        $this = $(this);
        if (!$this.data('RDNavbar')) {
          return $this.data('RDNavbar', new RDNavbar(this, options));
        }
      }

      /**
       * RD Navbar window export
       * @public
       */
    });
    return window.RDNavbar = RDNavbar;
  })(window.jQuery, document, window);


  /**
   * The Plugin AMD export
   * @public
   */

  if (typeof module !== "undefined" && module !== null) {
    module.exports = window.RDNavbar;
  } else if (typeof define === 'function' && define.amd) {
    define(["jquery"], function() {
      'use strict';
      return window.RDNavbar;
    });
  }

}).call(this);