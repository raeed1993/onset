<?php

namespace Modules\Guest\Interfaces;

interface GuestInterface
{
    public function homePage();

    public function services();

    public function projects();

    public function blogs();

    public function findBySlug($slug);
}
