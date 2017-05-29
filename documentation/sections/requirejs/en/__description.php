<h2 class="item1">Integration with Require.js</h2>

<h5>
    The script has built-in support of AMD export for integration with Require.js. The whole process of integration combines a few simple steps.
</h5>

<h3>
    Require.js configuration
</h3>

<p>
    First of all, you need to make sure that the configuration of the paths in require.js is correct. It is necessary to define the aliases jquery and jquery.rd-navbar. In most cases, this configuration is defined in the main application script, the path to which is defined in the date data-main attribute when connecting require.js
</p>

<code>
<pre>
&lt;script data-main="js/main" src="js/require.js"&gt;&lt;/script&gt;
</pre>
</code>

<p>
    The configuration itself must contain the following aliases for paths
</p>

<code>
<pre>
requirejs.config({
  paths: {
    "jquery": "path/to/jquery.min.js"
    "jquery.rd-navbar": "path/to/jquery.rd-navbar.min.js"
  }
});
</pre>
</code>

<h3>
    Script initialization
</h3>

<p>
    It takes you only to use the following code to initialize the script:
</p>

<code>
<pre>
requirejs(["jquery", "jquery.rd-navbar"], function($, parallax) {
  var o = $(".rd-navbar");
  o.RDNavbar({});
});
</pre>
</code>

