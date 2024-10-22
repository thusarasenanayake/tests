<?php

namespace App\Controllers;

use SimpleXMLElement;

class Home extends BaseController
{
    public function index(): string
    {
        return view('main');
    }

    public function create()
    {

        // helper('form');
        // $content = $this->request->getPost('content');
        // dd($this->request->getPost(['content']));

        $data = $this->request->getPost(['content']);

        if (! $this->validateData($data, [
            'content'  => 'required|min_length[1]',
            // 'content'  => 'required|max_length[5000]|min_length[1]',
        ])) {
            // $data['errors'] = $this->validator->getErrors();
            // return view('my_form', $data);

            // return view('main');
        }

        return view('main');
    }

  
}
