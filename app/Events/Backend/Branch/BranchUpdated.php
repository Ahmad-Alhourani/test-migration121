<?php namespace App\Events\Backend\Branch;

use Illuminate\Queue\SerializesModels;
/**
 * Class BranchUpdated.
 */
class BranchUpdated
{
    use SerializesModels;
    /**
     * @var
     */

    public $branch;

    /**
     * @param $branch
     */
    public function __construct($branch)
    {
        $this->branch = $branch;
    }
}
