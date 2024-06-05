<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('dashboard', route('dashboard'));
});

// Home > Blog
Breadcrumbs::for('dashboard.halaman.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Halaman', route('halaman.index'));
});
Breadcrumbs::for('dashboard.halaman.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Halaman', route('halaman.create'));
});
// Dashboard > Experience
Breadcrumbs::for('dashboard.experience.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Experience', route('experience.index'));
});
Breadcrumbs::for('dashboard.experience.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Experience', route('experience.create'));
});
// Dashboard > education
Breadcrumbs::for('dashboard.education.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Education', route('education.index'));
});
Breadcrumbs::for('dashboard.education.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Education', route('education.create'));
});
//Dashboard > skill
Breadcrumbs::for('dashboard.skill.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Skill', route('skill.index'));
});
// Dashboard Project
Breadcrumbs::for('dashboard.project.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project', route('project.index'));
});
Breadcrumbs::for('dashboard.project.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project', route('project.create'));
});
//Dashboard > contact
Breadcrumbs::for('dashboard.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contact', route('contact.index'));
});
// Dashboard > category
Breadcrumbs::for('dashboard.category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Category', route('category.index'));
});

//Dashboard > profile
Breadcrumbs::for('dashboard.profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile.index'));
});
// Dashboard > Setting
Breadcrumbs::for('dashboard.setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting', route('setting.index'));
});
// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
