<?php

namespace App\Traits;

use Session;

trait Impersonate
{
     public function setImpersonating($id)
     {
          Session::put('impersonate', $id);
     }

     public function stopImpersonating()
     {
          Session::forget('impersonate');
     }

     public function isImpersonating()
     {
          Session::has('impersonate');
     }
}
