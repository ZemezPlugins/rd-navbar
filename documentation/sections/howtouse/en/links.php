<h3>
    Linker Adjustment
</h3>

<p>
    RD Navbar also supports the ability to link the current layout to other elements. So, for example, in the demo, navbar's layout is linked to the html tag for the demonstration. Thus, when changing the Navbar's Layout, the Layout class changes not only on the Navbar itself but also on linked elements with the addition of the suffix -linked.
</p>

<p>
    So, with the active .rd-navbar-fixed, the .rd-navbar-fixed-linked class will be added to the html tag.
</p>

<p>
    This functional will be very useful for shops where a product filter is usually displayed outside the navigation bar in the form of a sidebar. Using the linker RD Navbar, it is very easy and convenient to visually place this sidebar on the navbar panel as a product filter switch.
</p>

<p>
    In order to link the corresponding elements of the page outside the navbar, you need to use the linkedElements attribute, where an array of target HTML elements or CSS selectors for their selection is passed as the value.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      linkedElements: [".magento-sidebar", $('.something-else')[0]]
   })
...
</pre>
</code>