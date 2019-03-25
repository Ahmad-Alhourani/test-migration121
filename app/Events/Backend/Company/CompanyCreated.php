<?php
namespace App\Events\Backend\Company;

use Illuminate\Queue\SerializesModels;
/**
 * Class CompanyCreated.
 */
class CompanyCreated
{
    use SerializesModels;
    /**
     * @var
     */

    public $company;

    /**
     * @param $company
     */
    public function __construct($company)
    {
        $this->company = $company;
    }
}
