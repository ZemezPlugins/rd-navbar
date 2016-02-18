<h3>
    Настройка прилипающей панели
</h3>

<p>
    Для того, чтобы включить прилипание навбара при скролле, необходимо воспользоваться атрибутом stickUp: true.
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
    Прилипающая панель в RD Navbar имеет два режима работы: прилипание оригинальной панели и прилипание клон-эелемента. Для
    определения
    режима прилипания необходимо воспользоваться атрибутом stickUpClone (true|false) и указать оффсет прилипания от верхней позиции навбара
    в настройках скрипта. При этом атрибут stickUp должен быть установлен в true.
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
   Так, в данном примере, для создания эффекта прилипания навбара будет использоваться его клон-версия,
   как только навбар будет полностью проскролен на странице.
</p>

<p>
    Также, в случае необходимости, можно указать responsive object с помощью HTML. Для этого необходимо указать следующие аттрибуты
</p>

<code>
<pre>
&lt;!-- RD Navbar --&gt;
&lt;nav class="rd-navbar" data-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"&gt;
</pre>
</code>


