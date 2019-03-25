<?php namespace App\Events\Backend\Branch;

use Illuminate\Queue\SerializesModels;
/**
 * Class BranchDeleted.
 */

class BranchDeleted
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
