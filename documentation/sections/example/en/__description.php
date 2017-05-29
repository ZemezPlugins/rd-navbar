<h2 class="item1">Connection example</h2>

<h5>
    Below is a basic example of the RD Navbar connection to a page based on the demo page.
</h5>

<p>
    <strong>Please note:</strong> the proposed initialization option may differ depending on the product in which it is implemented. The information provided below only shows the way to connect the sample demo.
</p>

<h3>
    Download the script from Git
</h3>

<p>
    To get started, you need to download this script from our public repository:
    <a href="http://products.git.devoffice.com/coding-development/rd-navbar">Сlickable</a>
</p>


<h3>
    Add the necessary markup
</h3>

<p>
    The HTML markup by default for creating the navigation bar is as follows.
</p>

<code>
<pre>
&lt;!-- RD Navbar --&gt;
&lt;div class="rd-navbar-wrap"&gt;
    &lt;nav class="rd-navbar" data-rd-navbar-lg="rd-navbar-static"&gt;
        &lt;div class="rd-navbar-inner"&gt;
            &lt;!-- RD Navbar Panel --&gt;
            &lt;div class="rd-navbar-panel"&gt;
                &lt;div class="rd-navbar-panel-canvas"&gt;&lt;/div&gt;

                &lt;!-- RD Navbar Toggle --&gt;
                &lt;button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"&gt;&lt;span&gt;&lt;/span&gt;
                &lt;/button&gt;
                &lt;!-- END RD Navbar Toggle --&gt;

                &lt;!-- RD Navbar Cart Toggle --&gt;
                &lt;div class="rd-navbar-cart-wrap"&gt;
                    &lt;div class="rd-navbar-cart-floating"&gt;
                        &lt;button class="rd-navbar-cart-toggle"
                                data-rd-navbar-toggle=".rd-navbar-cart, .rd-navbar-cart-floating"&gt;
                            &lt;span&gt;&lt;/span&gt;
                        &lt;/button&gt;
                        &lt;a href="#" class="rd-navbar-cart-buy material-icons-card_membership"&gt;Go to Checkout&lt;/a&gt;
                    &lt;/div&gt;
                    &lt;div class="rd-navbar-cart"&gt;
                        &lt;ul class="rd-navbar-cart-items"&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/1"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Lorem ipsum dolor sit&lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x3&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/2"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Corporis incidunt non&lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x1&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/3"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Assumenda id quia
                                        &lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x4&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/4"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Labore quae suscipit&lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x5&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/5"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Dicta fugit nesciunt
                                        &lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x3&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;div class="rd-navbar-cart-item"&gt;
                                    &lt;div class="rd-navbar-cart-item__left"&gt;
                                        &lt;img src="//lorempixel.com/56/56/technics/6"
                                             alt=""
                                             class="rd-navbar-cart-item__preview"&gt;&lt;/div&gt;

                                    &lt;div class="rd-navbar-cart-item__body"&gt;
                                        &lt;div class="rd-navbar-cart-item__title"&gt;Eaque ex maiores&lt;/div&gt;
                                        &lt;div class="rd-navbar-cart-item__counter"&gt;x6&lt;/div&gt;
                                    &lt;/div&gt;
                                    &lt;a href="#" class="rd-navbar-cart-item__remove material-icons-delete"&gt;&lt;/a&gt;
                                &lt;/div&gt;
                            &lt;/li&gt;
                        &lt;/ul&gt;
                        &lt;a href="#" class="rd-navbar-cart-buy material-icons-card_membership"&gt;Go to Checkout&lt;/a&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;!-- END RD Navbar Cart Toggle --&gt;

                &lt;!-- RD Navbar Collapse Toggle --&gt;
                &lt;button class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"&gt;
                    &lt;span&gt;&lt;/span&gt;
                &lt;/button&gt;
                &lt;ul class="rd-navbar-collapse"&gt;
                    &lt;li&gt;
                        &lt;a href="#"&gt;Account&lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                        &lt;a href="#"&gt;My Cart&lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                        &lt;a href="#"&gt;Register&lt;/a&gt;
                    &lt;/li&gt;
                    &lt;li&gt;
                        &lt;a href="#"&gt;Login&lt;/a&gt;
                    &lt;/li&gt;
                &lt;/ul&gt;
                &lt;!-- END RD Navbar Collapse Toggle --&gt;

                &lt;!-- RD Navbar Brand --&gt;
                &lt;div class="rd-navbar-brand"&gt;
                    &lt;img src="images/favicon.png" alt="" class="brand"&gt;
                    &lt;a href="index.html" class="brand-name"&gt;
                        &lt;span&gt;RD&lt;/span&gt; Navbar
                    &lt;/a&gt;
                &lt;/div&gt;
                &lt;!-- END RD Navbar Brand --&gt;
            &lt;/div&gt;
            &lt;!-- END RD Navbar Panel --&gt;
        &lt;/div&gt;
        &lt;div class="rd-navbar-outer"&gt;
            &lt;div class="rd-navbar-inner"&gt;


                &lt;div class="rd-navbar-subpanel"&gt;
                    &lt;div class="rd-navbar-nav-wrap"&gt;
                        &lt;!-- RD Navbar Nav --&gt;
                        &lt;ul class="rd-navbar-nav"&gt;
                            &lt;li class="active"&gt;
                                &lt;a href="#home"&gt;Home&lt;/a&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;a href="#about"&gt;About&lt;/a&gt;

                                &lt;!-- RD Navbar Dropdown --&gt;
                                &lt;ul class="rd-navbar-dropdown"&gt;
                                    &lt;li&gt;
                                        &lt;a href="shortcodes.php"&gt;Shortcodes&lt;/a&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;a href="#"&gt;Lorem ipsum dolor&lt;/a&gt;
                                        &lt;ul class="rd-navbar-dropdown"&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Lorem ipsum dolor&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Nulla sequi, sint&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Corporis, quos, sit&lt;/a&gt;
                                            &lt;/li&gt;
                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;a href="#"&gt;Dolor sit amet&lt;/a&gt;
                                    &lt;/li&gt;
                                &lt;/ul&gt;
                                &lt;!-- END RD Navbar Dropdown --&gt;

                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;a href="#features"&gt;Features&lt;/a&gt;

                                &lt;!-- RD Navbar Megamenu --&gt;
                                &lt;ul class="rd-navbar-megamenu"&gt;
                                    &lt;li&gt;
                                        &lt;ul&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Service&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Titanium Service&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Metal Service&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Steel Detailing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Steel Coating&lt;/a&gt;
                                            &lt;/li&gt;
                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;ul&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Steel Plate Shearing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Brazing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Annealing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Deburring&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Structural Steel Detailing&lt;/a&gt;
                                            &lt;/li&gt;
                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;ul&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel &amp; Round Bar&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Plate &amp; Sheet&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;CNC, 7-Axis&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Steel Mill Maintenance&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Structural Steel&lt;/a&gt;
                                            &lt;/li&gt;

                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;ul&gt;

                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Grinder Remanufacturing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Cutting&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Coating&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Polishing&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Heat Treating&lt;/a&gt;
                                            &lt;/li&gt;
                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                    &lt;li&gt;
                                        &lt;ul&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Tube Fabrication &amp; Bending&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Steel Hardening&lt;/a&gt;
                                            &lt;/li&gt;
                                            &lt;li&gt;
                                                &lt;a href='#'&gt;Stainless Steel Welding&lt;/a&gt;
                                            &lt;/li&gt;
                                        &lt;/ul&gt;
                                    &lt;/li&gt;
                                &lt;/ul&gt;
                                &lt;!-- END RD Navbar Megamenu --&gt;

                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;a href="#credits"&gt;Credits&lt;/a&gt;
                            &lt;/li&gt;
                            &lt;li&gt;
                                &lt;a href="#"&gt;Buy Now!&lt;/a&gt;
                            &lt;/li&gt;
                        &lt;/ul&gt;
                        &lt;!-- END RD Navbar Nav --&gt;
                    &lt;/div&gt;

                    &lt;!-- RD Navbar Search Toggle --&gt;
                    &lt;div class="rd-navbar-search-wrap"&gt;
                        &lt;button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"&gt;
                            &lt;span&gt;&lt;/span&gt;
                        &lt;/button&gt;
                        &lt;div class="rd-navbar-search"&gt;
                            &lt;form action="" method="post"&gt;
                                &lt;div class="form-group"&gt;
                                    &lt;input id="rd-navbar-search-input" type="text" class="form-control"
                                           placeholder="Search"&gt;
                                &lt;/div&gt;
                                &lt;button type="submit" class="material-icons-search"&gt;&lt;/button&gt;
                            &lt;/form&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;!-- END RD Navbar Search Toggle --&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/nav&gt;
&lt;/div&gt;
&lt;!-- END RD Navbar --&gt;
</pre>
</code>

<h3>
    Connect styles
</h3>

<p>
    Connect the styles file rd-navbar.css in the &lt;head/&gt; section of the target page.
</p>

<code>
<pre>
&lt;link rel="stylesheet" href="path/to/css/rd-navbar.css"&gt;
</pre>
</code>

<h3>
    Connect the script to the page
</h3>

<p>
    You need to copy the script into the / js folder of your project and connect it on the page. You can use the following code area:
</p>

<code>
<pre>
&lt;script src="js/jquery.rd-navbar.min.js"&gt;&lt;/script&gt;
</pre>
</code>


<h3>
    Initialize the script
</h3>

<p>
    You need to initialize the script for the elements on the target selector, using the next code section
</p>

<code>
<pre>
&lt;script&gt;
  $(document).ready(function () {
    o.RDNavbar({}); // Additional options
  });
&lt;/script&gt;
</pre>
</code>




