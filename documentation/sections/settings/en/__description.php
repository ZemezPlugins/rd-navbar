<h2 class="item1">Script settings</h2>

<h6>Symbols for data attributes:</h6>
<p>
    (*) - is a suffix that determines for which screen size the property will be defined. Suffixes:
</p>

<ul class="marked-list">
    <li>
        <dl class="inline-term">
            <dt>xs</dt>
            <dd>from 480px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>sm</dt>
            <dd>from 768px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>md</dt>
            <dd>from 992px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>lg</dt>
            <dd>from 1199px</dd>
        </dl>
    </li>
</ul>

<h3>
    Settings
</h3>

<h5>layout or data-(*)-layout</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>The default value</dt>
    <dd>'rd-navbar-static'</dd>
</dl>

<p>
    Defines the type of navbar's layout
</p>

<h5>deviceLayout or data-(*)-device-layout</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>The default value</dt>
    <dd>'rd-navbar-fixed'</dd>
</dl>

<p>
    Determines the type of navbar’s layout for mobile devices
</p>

<h5>focusOnHover or data-(*)-hover-on</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>true</dd>
</dl>

<p>
    Enables/Disables the submenu display on hover
</p>

<h5>focusOnHoverTimeout</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>The default value</dt>
    <dd>800</dd>
</dl>

<p>
    Specifies the time (ms) for the delay to automatically hide the submenu and the hover out.
</p>

<h5>linkedElements</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Array</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>['html']</dd>
</dl>

<p>
    Defines an array for creating linked elements. The value of an array element can be either a selector or an HTML element. When you change the layout of Navbar, each of the linked elements will be hovered with the appropriate [layout] -linked format class.
</p>

<h5>domAppend</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>true</dd>
</dl>

<p>
    The toggle that is responsible for the automatic addition of the specified HTML markup of Navbar with additional service classes and elements.
</p>

<h5>stickUp или data-(*)-stick-up</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>true</dd>
</dl>

<p>
    The toggle responsible for sticking the panel when scrolling.
</p>

<h5>stickUpClone</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>true</dd>
</dl>

<p>
    Determines which element will be used to create the sticking effect when scrolling: clone or original.
</p>

<h5>stickUpOffset или data-(*)-stick-up-offset</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Number|String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>'100%'</dd>
</dl>

<p>
    Determines the distance from the beginning of the navbar, at which the sticking of the panel will occur when scrolling. You can use both the exact distance, and the percentage of the height of navbar.
</p>

<h5>anchorNavSpeed</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Number</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>400</dd>
</dl>

<p>
    Determines the motion speed when using single-page anchor navigation.
</p>

<h5>anchorNavOffset</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Number</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>0</dd>
</dl>

<p>
    Specifies the additional motion distance when using single-page anchor navigation. You can use a negative value.
</p>

<h5>anchorNavEasing</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>'swing'</dd>
</dl>

<p>
    Defines the name of the temporary motion function when using single-page navigation. Requires the jQuery Easing 1.1+ plug-in.
</p>

<h5>autoHeight or data-(*)-auto-height</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Default value</dt>
    <dd>true</dd>
</dl>

<p>
    Determines if the height for rd-navbar-wrap will be calculated.
</p>

<h5>responsive</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Object</dd>
</dl>

<p>
    The object that is used to override the default settings for specific permissions.
</p>

<h5>callbacks</h5>
<dl class="inline-term">
    <dt>Type</dt>
    <dd>Object</dd>
</dl>

<p>
    The object that is used to define callback functions for certain occasions.
</p>

<h3>
    Occasions
</h3>

<h5>Toggle Switched</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnToggleSwitch</dd>
</dl>

<p>
    It is determined when the toggle state changes. Returns the affected toggle and the context of navbar
</p>

<h5>Toggle Closed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnToggleClose</dd>
</dl>

<p>
    It is determined when the toggle is deactivated. Returns the affected toggle and the context of navbar
</p>

<h5>Dom Appended</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDomAppend</dd>
</dl>

<p>
    It is defined when the specified HTML markup of Navbar with additional service elements and classes are added. Returns the context of navbar.
</p>

<h5>Submenu Mouse Enter</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownOver</dd>
</dl>

<p>
    It is determined when the mouse pointer is on a menu item containing a submenu. Returns the affected menu item and the context of navbar.
</p>

<h5>Submenu Mouse Leave</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownOut</dd>
</dl>

<p>
    It is determined when the mouse pointer leaves the menu item containing the submenu. Returns the affected menu item and the context of navbar.
</p>

<h5>Submenu Toggled</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownToggle</dd>
</dl>

<p>
    It is determined when the submenu is activated/deactivated. Returns the affected menu item and the context of navbar.
</p>

<h5>Submenu Closed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownClose</dd>
</dl>

<p>
    It is defined when the submenu is deactivated. Returns the affected menu item and the context of navbar.
</p>

<h5>Navbar Sticked Up</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnStuck</dd>
</dl>

<p>
    It is determined while sticking of the navbar panel.
</p>

<h5>Navbar Came Static</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnUnstuck</dd>
</dl>

<p>
    It is determined when the navbar panel changes to static mode.
</p>

<h5>Anchor Changed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnAnchorChange</dd>
</dl>

<p>
    It is determined when the current element of single-page anchor navigation changes.
</p>










