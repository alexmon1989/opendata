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

// Home > Contacts
Breadcrumbs::register('contacts', function($breadcrumbs, $h1)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Контакти', route('contacts'), $h1);
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs, $h1)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Про сервіс', route('about'), $h1);
});