<h3>
    Sticky panel setting
</h3>

<p>
    In order to enable navbar sticking while scrolling, you need to use the attribute stickUp: true
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      responsive: {
         0: {
            layout: 'rd-navbar-fixed',
            stickUp: false
         },
         768: {
            layout: 'rd-navbar-fullwidth',
            stickUp: true
         }
         1200: {
            layout: 'rd-navbar-static',
            stickUp: true
         }
      }
   })
...
</pre>
</code>


<p>
    The sticky panel in the RD Navbar has two modes of operation: the original panel sticking and the clone-element sticking. To determine the sticking mode, you need to use the stickUpClone (true | false) attribute and specify the offset sticking from the top position of the navbar in the script settings. The stickUp attribute must be set in true.
</p>

<code>
<pre>
...
   o = $('.rd-navbar');

   o.RDNavbar({
      responsive: {
         0: {
            layout: 'rd-navbar-fixed',
            stickUp: false
         },
         768: {
            layout: 'rd-navbar-fullwidth',
            stickUp: true,
            stickUpClone: true,
            stickUpOffset: '100%'
         }
         1200: {
            layout: 'rd-navbar-static',
            stickUp: true,
            stickUpClone: true,
            stickUpOffset: '100%'
         }
      }
   })
...
</pre>
</code>

<p>
   So, in this example, to create the sticking effect of Navbar, its clone version will be used as soon as the Navbar is completely scrolled on the page.
</p>

<p>
    Also, if necessary, you can specify a responsive object using HTML. To do this, you must specify the following attributes
</p>

<code>
<pre>
&lt;!-- RD Navbar --&gt;
&lt;nav class="rd-navbar" data-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"&gt;
</pre>
</code>


