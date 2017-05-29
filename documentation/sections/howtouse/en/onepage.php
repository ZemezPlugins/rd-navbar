<h3>
    Single page navigation adjustment
</h3>

<p>
    RD Navbar supports the functional for creating single page anchor page navigation.
</p>

<p>
    To implement anchor navigation on the page, you need to specify the hash tag of the identifier of the target anchor section with the attribute data-type = "anchor" as the value of the href attribute in the navigation links.
</p>

<code>
<pre>
...
   &lt;a href="#about"&gt;About&lt;/a&gt;
...

...
   &lt;section id="about" data-type="anchor"&gt;
       ...
   &lt;/section&gt;
...
</pre>
</code>