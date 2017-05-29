<h3>
    Setting switches (toggles)
</h3>

<p>
    RD Navbar contains a very convenient system of toggles that can be used in various situations, for example, when you need to show / hide the navigation menu or search, or any other element of navbar.
</p>

<p>
    To create a switch, use the following markup
</p>

<code>
<pre>
...
   &lt;button data-rd-navbar-toggle=".element-1, #element-2, [data-type='element-3']."&gt;&lt;/button&gt;
...
</pre>
</code>

<p>
    , where data-rd-navbar-toggle contains the most common css selector of elements for which a toggle is needed.
</p>

<p>
    When the switch is activated, an .active class is hung on the element, which allows you to perform various manipulations with it: move, hide, display, zoom, etc.
</p>

<p>
    For example, in the demo, the toggles are used to display / hide menus, carts, search and dropdown with additional links.
</p>
