<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Dcat\Admin\Traits\HasDomain;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DomainMailSetting extends Model {

    use HasDateTimeFormatter;
    use HasDomain;

    protected $primaryKey = "domain_id";
    public $incrementing = false;
    protected $fillable = ['transport', 'encryption',  'default_department_id', 'host', 'port', 'username', 'password'];

    protected $table = 'mail_settings';

    public function default_department() : HasOne {
        return $this->hasOne(EmailDepartment::class, 'id', 'default_department_id');
    }
}