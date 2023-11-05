<?php
namespace App\Models;

use File;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Dcat\Admin\Models\Domain;
use App\DomainTemplateMailable;
use Dcat\Admin\Traits\HasDomain;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\MailDepartmentInterface;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use App\Exceptions\MissingDomainMailTemplate;
use Spatie\MailTemplates\Models\MailTemplate;
use App\Interfaces\DomainMailTemplateInterface;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomainMailTemplate extends MailTemplate implements DomainMailTemplateInterface {

    use Cachable;
    use HasDateTimeFormatter;
    use HasDomain;
    
    protected $table = 'mail_templates';
    protected $appends = ['mailableTitle'];

    public function department() : BelongsTo
    {
        return $this->belongsTo(EmailDepartment::class, 'department_id');
    }

    public function getEmailDepartment(): ?MailDepartmentInterface
    {
        return $this->department;
    }

    public function scopeForDomainMailable(Builder $query, DomainTemplateMailable $mailable): Builder
    {
        $query->where('mailable', get_class($mailable))
            ->where('domain_id', $mailable->getDomainId());

        return $query;
    }

    public static function findForDomainMailable(DomainTemplateMailable $mailable): self
    {
        $mailTemplate = static::forDomainMailable($mailable)->with('department')->first();

        if (! $mailTemplate) {
            throw MissingDomainMailTemplate::forDomainMailable($mailable);
        }

        return $mailTemplate;
    }

    public static function fillTypesForDomains() : void {
        $types = config('funded.email_template_types');
        $domains = Domain::all();

        collect($types)->each(function ($type) use($domains) {
            $domains->each( function($domain) use($type) {

                $subject = Str::of($type)->remove('App\\Mail\\')->remove('Mail');
                $parts = preg_split('/(?=[A-Z])/', $subject, -1, PREG_SPLIT_NO_EMPTY);
                $subject = Arr::join($parts, ' ');

                $fileName = Arr::join($parts, '_');
                $fileName = Str::of($fileName)->lower();
                $path = config('view.paths')[0];
                $fileName = $path.'/emails/'.$fileName.'.blade.php';

                $template = '';
                if(File::exists($fileName))
                    $template = File::get($fileName);

                self::insertOrIgnore([
                    'domain_id' => $domain->id,
                    'mailable' => $type,
                    'subject' => $subject,
                    'html_template' => $template,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } );   
        });
    }

    public static function getTypeFromClass(string $className) : string {
        return Str::remove('App\\Mail\\', $className);
    }

    public static function getTitle(string $className) : string {
        return __('mail.'.self::getTypeFromClass($className));
    }    

    public function getMailableTitleAttribute() : string {
        return __('email-template.'.self::getTypeFromClass($this->mailable));
    }        
}