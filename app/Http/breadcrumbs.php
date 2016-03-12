<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Головна', route('home'));
});

// Home > Search
Breadcrumbs::register('search', function($breadcrumbs, $h1)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Пошук', route('search'), $h1);
});