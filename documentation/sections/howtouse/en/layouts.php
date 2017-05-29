<h3>
    Adjustment of the navbar’s layouts
</h3>

<p>
    RD Navbar is inherently responsive. While the vast majority of third-party solutions use the backup navigation to display desktop and mobile navigation versions, RD Navbar offers a radically different solution.
</p>

<p>
    The essence of working with Navbar layouts is to define specific layout classes (.rd-navbar-fixed, .rd-navbar-static, .rd-navbar-sidebar, etc.), which are hung on the main Navbar element with the class .rd- Navbar, depending on the current window size of the user’s browser.
</p>

<p>
    This approach allows you to quickly and without extra effort perform a complete restyling of navigation, depending on the specific resolution.
</p>

<p>
    To create a responsive navigation, navbar's layout classes are defined in a special responsive object when the script is initialized.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      responsive: {
         0: {
            layout: 'rd-navbar-fixed'
         },
         768: {
            layout: 'rd-navbar-fullwidth'
         }
         1200: {
            layout: 'rd-navbar-static'
         }
      }
   })
...
</pre>
</code>

<p>
    If necessary, you can also specify additional navbar's layouts that will be displayed exclusively on the Touch devices using the deviceLayout attribute.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      responsive: {
         0: {
            layout: 'rd-navbar-fixed'
            deviceLayout: 'rd-navbar-fixed'
         },
         768: {
            layout: 'rd-navbar-fullwidth'
            deviceLayout: 'rd-navbar-fixed'
         }
         1200: {
            layout: 'rd-navbar-static'
            deviceLayout: 'rd-navbar-fixed'
         }
      }
   })
...
</pre>
</code>

<p>
    Thus, you can achieve the effect of matching navigation styling, for example, to the Material Design standard on mobile devices.
</p>

<p>
    Also, if necessary, you can specify a responsive object using HTML. To do this, you should specify the following attributes
</p>

<code>
<pre>
&lt;!-- RD Navbar --&gt;
&lt;nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth"
                        data-lg-layout="rd-navbar-static" data-deviceLayout="rd-navbar-fixed"&gt;
</pre>
</code>




