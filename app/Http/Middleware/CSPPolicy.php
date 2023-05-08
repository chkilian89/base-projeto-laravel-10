<?php

namespace App\Http\Middleware;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;

class CSPPolicy extends \Spatie\Csp\Policies\Policy
{
    public function configure()
    {
        if (config('app.env') == 'local' || config('app.env') == 'development') {
            $this->reportOnly();
        }
        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, Keyword::SELF . ' *.google-analytics.com google-analytics.com ')
            ->addDirective(Directive::DEFAULT, Keyword::SELF)
            ->addDirective(Directive::IMG, Keyword::SELF)
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::SCRIPT, Keyword::SELF)
            ->addDirective(Directive::STYLE, Keyword::SELF)
            ->addDirective(Directive::WORKER, Keyword::SELF)
            ->addDirective(Directive::IMG, Keyword::SELF . " *.google-analytics.com google-analytics.com cdnjs.cloudflare.com *.amazonaws.com data:")
            ->addDirective(Directive::SCRIPT, Keyword::SELF . " *.cdnjs.cloudflare.com cdnjs.cloudflare.com  *.maxcdn.bootstrapcdn.com maxcdn.bootstrapcdn.com *.cdn.jsdelivr.net cdn.jsdelivr.net *.googletagmanager.com googletagmanager.com *.google-analytics.com google-analytics.com mozilla.github.io 'unsafe-inline'  wurfl.io unsafe-eval")
            ->addDirective(Directive::STYLE, Keyword::SELF . " *.googleapis.com googleapis.com *.cdn.jsdelivr.net cdn.jsdelivr.net *.maxcdn.bootstrapcdn.com maxcdn.bootstrapcdn.com *.gateway.zscaler.net gateway.zscaler.net *.cdnjs.cloudflare.com cdnjs.cloudflare.com *.code.ionicframework.com code.ionicframework.com 'unsafe-inline' stackpath.bootstrapcdn.com")
            ->addDirective(Directive::FONT, Keyword::SELF . " *.googleapis.com googleapis.com *.gstatic.com gstatic.com data:  *.maxcdn.bootstrapcdn.com maxcdn.bootstrapcdn.com *.code.ionicframework.com code.ionicframework.com *.cdn.jsdelivr.net cdn.jsdelivr.net stackpath.bootstrapcdn.com")
            ->addDirective(Directive::WORKER, Keyword::SELF . "data: blob:");
    }
}
