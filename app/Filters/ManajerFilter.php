<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ManajerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session('id_user')) {
            return redirect()->to(site_url('login'))->with('error','Login Terlebih Dahulu!');
           } 
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session('id_user') == 3 ) {
            return redirect()->to(site_url('homes'));
           } 
    }
}