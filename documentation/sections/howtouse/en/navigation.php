<h3>
    Navigation setting
</h3>

<p>
    RD Navbar supports usual drop-down menus as well as megamenus.
</p>

<p>
    In order to define the appropriate element as a drop-down menu or a megamenu, you need to use the .rd-navbar-dropdown and .rd-navbar-megamenu classes.
</p>

<p>
    Besides, RD Navbar supports the setting of interaction rules with menu items that contain submenus.
</p>

<p>
    For example, all menu items from a submenu contain the appropriate switches for displaying the submenu, by default. But, if necessary, you can specify the submenu display no the hover using the mouse. To do this, you must use the attribute focusOnHover: true for the corresponding Navbar layout class.
</p>

<p>
    For example, it's very convenient to display the submenu on the Hover on the desktop layout, while on the mobile one it does not make any sense. Using, responsive object navbar, we can very easily manipulate the behavior of the submenu.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      responsive: {
         0: {
            layout: 'rd-navbar-fixed',
            focusOnHover: false
         },
         992: {
            layout: 'rd-navbar-static',
            focusOnHover: true
         }
      }
   })
...
</pre>
</code>

<p>
    Also, for the simplicity and convenience of the navigation creation, you need some service classes on the elements and additional switch elements for the submenu. You don’t need to create these service elements and classes manually. The script will do it itself, simply set the flag domAppend: true.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      domAppend: true
   })
...
</pre>
</code>