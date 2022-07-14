<?php

namespace Modules\Contact\Repositories;

use Modules\Contact\Entities\Contact;
use Modules\Contact\Interfaces\ContactInterface;

class ContactRepository implements ContactInterface
{

    public function store($data)
    {
        $contact = new Contact();
        $contact->phone_number = $data['phone_number'];
        $contact->email = $data['email'];
        $contact->name = $data['name'];
        $contact->content = $data['content'];
        $contact->save();
        return $contact;
    }
}
