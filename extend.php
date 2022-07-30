<?php

/*
 * This file is part of cadiducho/bbcode.
 *
 * Copyright (c) 2021 Cadiducho.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Cadiducho\BBCode;

use Flarum\Extend;
use s9e\TextFormatter\Configurator;
use Flarum\Locale\Translator;

function accordion(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[accordion header="{TEXT4}"]{TEXT5}[/accordion]',
        '<div class="accordion">
                    <input type="checkbox" name="radacc" class="accordion-chk" />
                    <h3 class="accordion-header Button--primary">
                        {TEXT4}
                        <span class="acc-icon"><i class="fas fa-chevron-circle-down"></i></span>
                    </h3>
                    <div class="accordion-content Button">
                        <p>{TEXT5}</p>
                    </div>
                  </div>'
    );
}

function blur(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[blur]{ANYTHING4}[/blur]',
        '<p class="bbspoiler-blur">
                    {ANYTHING4}
                 </p>'
    );
}

function chat(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[chat-a="{TEXT27}" who="{TEXT26}"]',
        '<p class="chat-a Button">
                    <strong>{TEXT26}:</strong> {TEXT27}
                </p>'
    );
    $config->BBCodes->addCustom(
        '[chat-b="{TEXT29}" who="{TEXT28}"]',
        '<p class="chat-b Button--primary">
                    <strong>{TEXT28}:</strong> <span class="chat-b-normal">{TEXT29}</span>
                </p>'
    );
    $config->BBCodes->addCustom(
        '[spp]',
        '<p class="space"></p>'
    );
}

function font(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[red]{TEXT30}[/red]',
        '<span class="bbred">{TEXT30}</span>'
    );
    $config->BBCodes->addCustom(
        '[orange]{TEXT31}[/orange]',
        '<span class="bborange">{TEXT31}</span>'
    );
    $config->BBCodes->addCustom(
        '[yellow]{TEXT32}[/yellow]',
        '<span class="bbyellow">{TEXT32}</span>'
    );
    $config->BBCodes->addCustom(
        '[green]{TEXT33}[/green]',
        '<span class="bbgreen">{TEXT33}</span>'
    );
    $config->BBCodes->addCustom(
        '[blue]{TEXT34}[/blue]',
        '<span class="bbblue">{TEXT34}</span>'
    );
    $config->BBCodes->addCustom(
        '[purple]{TEXT35}[/purple]',
        '<span class="bbpurple">{TEXT35}</span>'
    );
    $config->BBCodes->addCustom(
        '[hl]{TEXT36}[/hl]',
        '<span class="bbhighlight">{TEXT36}</span>'
    );
    $config->BBCodes->addCustom(
        '[kbd]{TEXT37}[/kbd]',
        '<kbd>{TEXT37}</kbd>'
    );
    $config->BBCodes->addFromRepository('BACKGROUND');
    $config->BBCodes->addFromRepository('FONT');
    $config->BBCodes->addFromRepository('ALIGN');
    $config->BBCodes->addFromRepository('LEFT');
    $config->BBCodes->addFromRepository('RIGHT');
    $config->BBCodes->addFromRepository('JUSTIFY');
    $config->BBCodes->addFromRepository('SUB');
    $config->BBCodes->addFromRepository('SUP');

}

function pop(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[pop button="{TEXT8}" title="{ANYTHING}" content="{ANYTHING1}"]',
        '<div id="popmain">
                                  <a href="#popmodal-{ANYTHING}{ANYTHING1}" class="popbtn Button Button--primary">{TEXT8}</a>
                              </div>
                                  <div id="popmodal-{ANYTHING}{ANYTHING1}">
                                  <div class="popcontainer">
                                          <h2>{ANYTHING}</h2>
                                              <p>{ANYTHING1}</p>
                                  <div class="poplink">
                                  <a href="#popmain" class="popbtn Button Button--primary"><i class="fas fa-window-close"></i>&nbsp; close</a>
                                  </div>
                              </div>
                          </div>'
    );
}

function spoiler(Configurator $config)
{
    $translator = resolve(Translator::class);
    $config->BBCodes->addCustom(
        '[detail={ANYTHING2;optional;defaultValue=' . $translator->trans('edoras-formatting.spoiler.defaultValue') . '}]{ANYTHING3}[/detail]',
        '<details>
                    <summary><i class="fas fa-chevron-down"></i> {ANYTHING2}</summary>
                    <p>{ANYTHING3}</p>
                 </details>'
    );
}

function tooltip(Configurator $config)
{
    $config->BBCodes->addCustom(
        '[tooltip="{TEXT1}" placement="{TEXT2}"]{TEXT3}[/tooltip]',
        '<span class="bb-tooltip" data-tooltip="{TEXT1}" data-placement="{TEXT2}">{TEXT3}</span>'
    );
}

return [

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\Formatter())
        ->configure(function (Configurator $config) {
            $config->BBCodes->addFromRepository('TABLE');
            $config->BBCodes->addFromRepository('TBODY');
            $config->BBCodes->addFromRepository('TD');
            $config->BBCodes->addFromRepository('TH');
            $config->BBCodes->addFromRepository('TR');
            $config->BBCodes->addFromRepository('THEAD');
            $config->BBCodes->addFromRepository('HR');
            $config->BBCodes->addFromRepository('FLOAT');

            accordion($config);
            blur($config);
            chat($config);
            font($config);
            pop($config);
            spoiler($config);
            tooltip($config);
        }),
];
