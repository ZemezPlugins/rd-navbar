<h2 class="item1">Настройки скрипта</h2>

<h6>Обозначения для data атрибутов:</h6>
<p>
    (*) - суффикс, определяющий для какого размера экрана будет определено свойство. Суффиксы:
</p>

<ul class="marked-list">
    <li>
        <dl class="inline-term">
            <dt>xs</dt>
            <dd>от 480px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>sm</dt>
            <dd>от 768px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>md</dt>
            <dd>от 992px</dd>
        </dl>
    </li>
    <li>
        <dl class="inline-term">
            <dt>lg</dt>
            <dd>от 1199px</dd>
        </dl>
    </li>
</ul>

<h3>
    Настройки
</h3>

<h5>layout или data-(*)-layout</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>'rd-navbar-static'</dd>
</dl>

<p>
    Определяет тип лейаута навбара
</p>

<h5>deviceLayout или data-(*)-device-layout</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>'rd-navbar-fixed'</dd>
</dl>

<p>
    Определяет тип лейаута навбара для мобильных устройств
</p>

<h5>focusOnHover или data-(*)-hover-on</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>true</dd>
</dl>

<p>
    Включает/Отключает отображение подменю при ховере
</p>

<h5>focusOnHoverTimeout</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>800</dd>
</dl>

<p>
    Определяет время (мс) задержки автоматического скрытия подменю и ховер ауте.
</p>

<h5>linkedElements</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Array</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>['html']</dd>
</dl>

<p>
    Определяет массив для создания линкованных элементов. В качестве значения элемента массива может быть как селектор так и HTML элемент.
    При изменении лейаута навбара, на каждый из залинкованных элементов будет навешиваться сооветствующий класс формата [layout]-linked.
</p>

<h5>domAppend</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>true</dd>
</dl>

<p>
    Флаг, отвечающий за автоматическое дополнение указанной HTML разметки навбара дополнительными служебными классами и элементами.
</p>

<h5>stickUp или data-(*)-stick-up</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>true</dd>
</dl>

<p>
    Флаг, отвечающий за прилипание панели при скролле.
</p>

<h5>stickUpClone</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>true</dd>
</dl>

<p>
    Определяет, какой элемент будет использоваться для создания эффекта прилипания при скролле: клон или оригинал.
</p>

<h5>stickUpOffset или data-(*)-stick-up-offset</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Number|String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>'100%'</dd>
</dl>

<p>
    Определяет расстояние от начала навбара, при котором будет происходить залипание панели при скролле. Можно использовать как
    точное растояние, так и процент от высоты навбара.
</p>

<h5>anchorNavSpeed</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Number</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>400</dd>
</dl>

<p>
    Определяет скорость движения при использовании одностраничной якорной навигации
</p>

<h5>anchorNavOffset</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Number</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>0</dd>
</dl>

<p>
    Определяет дополнительное расстояние движения при использовании одностраничной якорной навигации. Можно использовать отрицательное значение.
</p>

<h5>anchorNavEasing</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>String</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>'swing'</dd>
</dl>

<p>
    Определяет название временной функции движения при использовании одностраничной навигации. Требует подключенного плагина jQuery Easing 1.1+.
</p>

<h5>autoHeight или data-(*)-auto-height</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Boolean</dd>
</dl>
<dl class="inline-term">
    <dt>Значение по-умолчанию</dt>
    <dd>true</dd>
</dl>

<p>
    Определяет, будет ли просчитываться высота для rd-navbar-wrap.
</p>

<h5>responsive</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Object</dd>
</dl>

<p>
    Объект, который используется для переопределения параметров по-умолчанию для специфических разрешений.
</p>

<h5>callbacks</h5>
<dl class="inline-term">
    <dt>Тип</dt>
    <dd>Object</dd>
</dl>

<p>
    Объект, который используется для определений callback функций для определенных событий
</p>

<h3>
    События
</h3>

<h5>Toggle Switched</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnToggleSwitch</dd>
</dl>

<p>
    Определяется при изменении состояния переключателя. Возвращает затронутый переключатель и контекст навбара
</p>

<h5>Toggle Closed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnToggleClose</dd>
</dl>

<p>
    Определяется при деактивации переключателя. Возвращает затронутый переключатель и контекст навбара
</p>

<h5>Dom Appended</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDomAppend</dd>
</dl>

<p>
    Определяется при дополнении указанной HTML разметки навбара дополнительными служебными элементами и классами.
    Возвращает контекст навбара.
</p>

<h5>Submenu Mouse Enter</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownOver</dd>
</dl>

<p>
    Определяется при наведении указателя мыши на пункт меню, содержащий подменю. Возращает затронутый пункт меню и контекст навбара.
</p>

<h5>Submenu Mouse Leave</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownOut</dd>
</dl>

<p>
    Определяется в случае, когда указатель мыши покидает пункт меню, содержащий подменю. Возращает затронутый пункт меню и контекст навбара.
</p>

<h5>Submenu Toggled</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownToggle</dd>
</dl>

<p>
    Определяется при активации/деактивации подменю. Возращает затронутый пункт меню и контекст навбара.
</p>

<h5>Submenu Closed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnDropdownClose</dd>
</dl>

<p>
    Определяется при деактивации подменю. Возращает затронутый пункт меню и контекст навбара.
</p>

<h5>Navbar Sticked Up</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnStuck</dd>
</dl>

<p>
    Определяется при прилипании панели навбара.
</p>

<h5>Navbar Came Static</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnUnstuck</dd>
</dl>

<p>
    Определяется при переходе панели навбара в статический режим.
</p>

<h5>Anchor Changed</h5>
<dl class="inline-term">
    <dt>Callback</dt>
    <dd>OnAnchorChange</dd>
</dl>

<p>
    Определяется при изменении текущего элемента одностраничной якорной навигации.
</p>










