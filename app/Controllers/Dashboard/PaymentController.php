<?php namespace App\Controllers\Dashboard;

use App\Controllers\Controller as Controller;
use App\Models\Payment;

class PaymentController extends Controller {

    public function __construct()
    {
      if(!auth('teacher')->check())
          redirect('sign-in.php');
    }

    public function index()
    {
       return (new Payment)->lasted()->all();
    }

    public function delete()
    {
      if(empty(request()->input('id',false)))
            redirect('dashboard/payments');

        if(!(new Payment())->find('id' , request()->input('id',false)))
          redirect('dashboard/payments');

       (new Payment())->delete(request()->input('id',false));
       flash()->info('پرداختی مورد نظر پاک شد');
       redirect('dashboard/payments');
    }


}
