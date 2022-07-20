<?php

namespace Modules\Guest\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Guest\Interfaces\GuestInterface;
use Modules\Guest\Repositories\GuestRepository;
use function Symfony\Component\String\s;

class PagesController extends Controller
{
    public function homePage(GuestInterface $interface)
    {
        $data = $interface->homePage();
        return view('pages.home', compact('data'));
    }

    public function services(GuestInterface $interface)
    {
        $services = $interface->services();
        return view('pages.services', compact('services'));
    }

    public function projects(GuestInterface $interface)
    {
        $projects = $interface->projects();
        return view('pages.projects', compact('projects'));
    }

    public function blogs(GuestInterface $interface)
    {
        $blogs = $interface->blogs();
        return view('pages.blogs', compact('blogs'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function aboutus(GuestInterface $interface)
    {
        $about = $interface->findBySlug('about-us');
        return view('pages.about', compact('about'));
    }

    public function show(GuestInterface $interface, $slug)
    {
        $obj = $interface->findBySlug($slug);
        switch ($obj->type) {

            case 2:
                return view('services.service', compact('obj'));
                break;
            case 3:
                return view('pages.contact');
                break;
            case 4:
                $blogs = $interface->latestBlogs();
                return view('blog.blog', compact('obj', 'blogs'));
                break;
            case 6:
                $links = GuestRepository::layout();
                return view('project.project', compact('obj', 'links'));
                break;

        }

    }
}
