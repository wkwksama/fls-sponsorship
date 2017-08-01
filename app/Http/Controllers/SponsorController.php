<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Sponsor;
use App\Mail\Thankyou;

class SponsorController extends Controller
{
    public function createWizard(){
        return view('wizard.register');
    }

    function store(Request $request){
        $sponsor = new Sponsor();
        $sponsor->type_sponsorship  = request('sponsorship_types');
        $sponsor->company_name      = request('company');
        $sponsor->pic               = request('pic');
        $sponsor->phone             = request('phone');
        $sponsor->email             = request('email');
        $sponsor->address           = request('address');
        $sponsor->explanation       = request('explanation');
        $sponsor->save();

        Mail::to($sponsor)
            ->bcc('mailpakgasing@gmail.com')
            ->send(new Thankyou($sponsor));

        return view('wizard.thankyou', ['sponsor' => $sponsor]);
	}

    public function index(){
        $sponsors = Sponsor::all();

        return view('admin.sponsor-table', compact('sponsors', 'request'));
    }
}
