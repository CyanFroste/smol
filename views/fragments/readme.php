<?php

use app\components\Code; ?>

<p>A Very Minimalistic PHP Framework for prototyping with TailwindCSS and Typescript support</p>

<h2>Getting Started</h2>

<h3>Prerequisites</h3>
<hr>

<ul>
  <li><a href="https://nodejs.org/en/">Node</a></li>
  <li><a href="https://www.apachefriends.org/">PHP</a></li>
  <li><a href="https://getcomposer.org/">Composer</a></li>
</ul>

<h3>Installation</h3>
<hr>

<dl>
  <?php foreach ([
    'Clone the repo' => 'git clone https://github.com/CyanFroste/smol.git',
    'Install PHP dependencies' => 'composer update',
    'Start dev server (This will start a PHP server on <a href="http://localhost:3000">http://localhost:3000</a>)' => 'npm start',
  ] as $instruction => $code) : ?>
    <dt><?= $instruction; ?></dt>
    <dd>
      <?php new Code(['content' => $code]) ?>
    </dd>
  <?php endforeach; ?>

</dl>

<blockquote>Note: Hot reloading is absent</blockquote>

<h3>Usage</h3>
<hr>

<ul>
  <?php foreach ([
    'Register new routes in <code>public/index.php</code>',
    'Add controllers inside <code>./controllers</code>',
    'Add views inside <code>./views</code>',
    'Supports minor reusable components which can be added inside <code>./components</code>'
  ] as $instruction) : ?>
    <li><?= $instruction; ?></li>
  <?php endforeach; ?>

  <li>
    <dl>
      <dt>To compile Tailwind</dt>
      <dd>
        <?php new Code(['content' => 'npm run cssw    // watch mode<br>npm run css    // production build']) ?>
      </dd>
    </dl>
  </li>
  <li>
    <dl>
      <dt>To compile Typescript</dt>
      <dd>
        <?php new Code(['content' => 'npm run tsw     // watch mode<br>npm run ts     // production build']) ?>
      </dd>
    </dl>
  </li>
</ul>

<h2>Make</h2>
<hr>

<p>A small utility to generate boilerplate code for controllers and components</p>

<p>Usage - From root directory, run</p>

<?php new Code([
  'content' => 'node make &lt;name&gt; -type<br>' .
    'Eg.<br><br>' .
    'npm run make -r HomeController   // Controller<br>' .
    'npm run make -c Button           // Component</code>'
]) ?>