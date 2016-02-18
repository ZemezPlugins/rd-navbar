<h3>
    Настройка лейаутов навбара
</h3>

<p>
    RD Navbar по своей природе ориентирован на респонсивность. В то время, когда подавляющее количество сторонних
    решений использует дублирование навигации для отображения десктопной и мобильной версий навигации, RD Navbar
    предлагает кардинально другое решение.
</p>

<p>
    Суть работы с лейаутами навбара сводится к определению специфических классов лейаутов (.rd-navbar-fixed,
    .rd-navbar-static, .rd-navbar-sidebar и т.д.), которые навешиваются на основной элемент навбара с классом .rd-navbar, в зависимости
    от текущего размера окна браузера у пользователя.
</p>

<p>
    Такой подход позволяет быстро и без особых усилий выполнять полную рестилизацию навигации в зависимости от
    определенного разрешения.
</p>

<p>
    Для создания респонсивной навигации классы лейаутов навбара определяются в специальном объекте responsive при инициализации
    скрипта.
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
    Также, в случае необходимости, можно указать дополнительные лейауты навбара, которые будут отображаться  исключительно
    на Touch устройствах, воспользовавшись атрибутом deviceLayout.
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
    Таким образом, можно добиться эффекта соответствия стилизации навигации, например, стандарту Material Design на мобильных устройствах.
</p>

<p>
    Также, в случае необходимости, можно указать responsive object с помощью HTML. Для этого необходимо указать следующие аттрибуты
</p>

<code>
<pre>
&lt;!-- RD Navbar --&gt;
&lt;nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth"
                        data-lg-layout="rd-navbar-static" data-deviceLayout="rd-navbar-fixed"&gt;
</pre>
</code>




