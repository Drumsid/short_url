<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class ValidUrl implements Rule
{
    private $client;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if (!preg_match($regex, $value))
        {
            return false;
        }
//нужно придумать проверку на не рабочие ссылки, а то вылетает исключение.['http_errors' => false]
        $res = $this->client->request('GET', $value);
        return $res->getStatusCode() == '200';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not valid Url!.';
    }
}
