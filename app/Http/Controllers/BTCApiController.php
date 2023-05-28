<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Services\EmailsDB;
use App\Services\BTCRate;
use App\Mail\BTCRateEmail;

class BTCApiController extends Controller
{
    /**
     * Get current BTC to UAH rate
     */
    public static function getRate()
    {
        return BTCRate::getRate();
    }

    /**
     * Add email to subscribers list
     */
    public static function subscribe(Request $request)
    {
        $email = $request->get('email');

        if (!isset($email)) {
            return false;
        }

        return EmailsDB::saveEmail($email);
    }

    /**
     * Send current BTC-UAH rate to all subscribers
     */
    public static function sendEmails()
    {
        $emails = EmailsDB::getEmails();

        if (!$emails) {
            return false;
        }

        $rate = self::getRate();

        foreach ($emails as $email) {
            Mail::to($email)->send(new BTCRateEmail($rate));
        }

        return true;
    }

    /*
    TESTING
    */

    public static function getEmails()
    {
        return EmailsDB::getEmails();
    }

    public static function dropEmails()
    {
        return EmailsDB::dropEmails();
    }
}
