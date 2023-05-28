<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class EmailsDB
{
    /**
     * Get filepath of list of emails
     */
    private static function getDB()
    {
        return Storage::path("emails.txt");
    }

    /**
     * Get all emails
     */
    public static function getEmails()
    {
        $db = self::getDB();

        if (!file_exists($db)) {
            return false;
        }

        $emails = [];

        $file = fopen($db, 'r');
        while (($line = fgets($file)) !== false) {
            $emails[] = str_replace(PHP_EOL, '', $line);
        }
        fclose($file);

        return $emails;
    }

    /**
     * Add new email to list
     */
    public static function saveEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $new_email = $email . PHP_EOL;

        $db = self::getDB();

        if (!file_exists($db)) {
            touch($db);

            file_put_contents($db, $new_email);

            return true;
        }

        $file = fopen($db, "r+");

        $email_found = false;

        while (($line = fgets($file)) !== false) {
            if ($line == $new_email) {
                $email_found = true;
                break;
            }
        }

        if (!$email_found) {
            fputs($file, $new_email);
        }

        fclose($file);

        return true;
    }

    /*
    TESTING
    */

    public static function dropEmails()
    {
        unlink(self::getDB());

        return true;
    }
}
